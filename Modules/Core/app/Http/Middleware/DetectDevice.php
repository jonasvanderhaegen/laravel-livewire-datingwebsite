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
        if ($agent->isMobile()) {
            view()->share('isMobile', true);
        } else {
            view()->share('isMobile', false);
        }

        return $next($request);
    }
    // @codeCoverageIgnoreEnd
}
