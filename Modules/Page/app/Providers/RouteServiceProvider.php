<?php

declare(strict_types=1);

namespace Modules\Page\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

final class RouteServiceProvider extends ServiceProvider
{
    protected string $name = 'Page';

    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     */
    public function boot(): void
    {
        parent::boot();

        RateLimiter::for('info-pages', fn (Request $r) => Limit::perMinute(60)->by($r->ip()));

    }

    /**
     * Define the routes for the application.
     */
    public function map(): void
    {
        $this->mapProtectedRoutes();
        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     */
    protected function mapWebRoutes(): void
    {
        Route::middleware(['web', 'throttle:info-pages'])->group(module_path($this->name, '/routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     */
    protected function mapProtectedRoutes(): void
    {
        Route::middleware(['auth', 'verified', 'throttle:info-pages'])->name('protected.')->group(module_path($this->name, '/routes/protected.php'));
    }
}
