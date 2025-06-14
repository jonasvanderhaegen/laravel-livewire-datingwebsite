<?php

declare(strict_types=1);

namespace Modules\Core\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

// add this at the top

final class DetectDevice
{
    /**
     * Handle an incoming request.
     */
    // @codeCoverageIgnoreStart
    public function handle(Request $request, Closure $next): SymfonyResponse
    {
        $agent = new Agent();
        $isMobile = $agent->isMobile();

        // make it available to views...
        view()->share('isMobile', $isMobile);

        // …and also stick it on the Request object
        $request->attributes->set('isMobile', $isMobile);

        return $next($request);
    }
    // @codeCoverageIgnoreEnd
}
