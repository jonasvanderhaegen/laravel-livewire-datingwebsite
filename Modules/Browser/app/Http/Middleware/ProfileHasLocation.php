<?php

declare(strict_types=1);

namespace Modules\Browser\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Masmerise\Toaster\Toaster;

final class ProfileHasLocation
{
    /**
     * Handle an incoming request.
     *
     * Ensure the authenticated user’s profile has at least one location set:
     * either `js_location` or both `lat` and `lng`. If not, flash an error
     * notification and redirect back.
     *
     * @param  Closure(Request): mixed  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        // If there’s no authenticated user or no profile, just proceed.
        if (! $user || ! $user->profile) {
            return $next($request);
        }

        $profile = $user->profile;

        $hasJsLocationEnabled = $profile->js_location;
        if (! $hasJsLocationEnabled) {
            Toaster::error('Please enable location tracking before proceeding.');
        }

        $hasLatLng = ! (is_null($profile->lat) || is_null($profile->lng));

        if (! $hasLatLng) {
            Toaster::error('Please add a location before proceeding.');
        }

        if (! $hasJsLocationEnabled || ! $hasLatLng) {

            return to_route('settings.account');
        }

        return $next($request);
    }
}
