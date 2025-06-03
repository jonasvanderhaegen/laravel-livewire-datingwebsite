<?php

declare(strict_types=1);

namespace Modules\Core\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\RateLimiter;
use Modules\Core\Http\Middleware\DetectDevice;

final class RouteServiceProvider extends ServiceProvider
{
    protected string $name = 'Core';

    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     */
    public function boot(): void
    {
        parent::boot();

        $router = $this->app->make(Router::class);
        $router->pushMiddlewareToGroup('web', DetectDevice::class);

        // 10 requests / minute for guest auth pages (login/register/reset)
        RateLimiter::for('guest-auth', fn (Request $r) => Limit::perMinute(10)->by($r->ip()));

        // 30 requests / minute across user settings & messages
        RateLimiter::for('user-actions',
            fn (Request $r) => Limit::perMinute(30)->by(optional($r->user())->id ?: $r->ip()));

    }

    /**
     * Define the routes for the application.
     */
    public function map(): void {}
}
