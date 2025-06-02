<?php

declare(strict_types=1);

namespace Modules\Core\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

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

        RateLimiter::for('guest-auth', fn (Request $r) => Limit::perMinute(10)->by($r->ip()));

    }

    /**
     * Define the routes for the application.
     */
    public function map(): void {}
}
