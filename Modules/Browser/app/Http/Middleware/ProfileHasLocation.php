<?php

declare(strict_types=1);

namespace Modules\Browser\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Masmerise\Toaster\Toaster;
use Modules\Profile\Models\Profile;

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
     */
    public function handle(Request $request, Closure $next): mixed
    {
        /** @var User $user */
        $user = $request->user();

        /** @var Profile $profile */
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
