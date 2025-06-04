<?php

declare(strict_types=1);

namespace Modules\OnboardUser\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Modules\OnboardUser\Http\Middleware\RedirectToUnfinishedOnboardingStep;

final class RouteServiceProvider extends ServiceProvider
{
    protected string $name = 'OnboardUser';

    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     */
    public function boot(): void
    {
        parent::boot();

        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('onboarded', RedirectToUnfinishedOnboardingStep::class);
    }

    /**
     * Define the routes for the application.
     */
    public function map(): void
    {
        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     */
    protected function mapWebRoutes(): void
    {
        Route::middleware(['web', 'verified', 'throttle:user-actions'])
            ->prefix('onboarding')
            ->name('onboard.')
            ->group(module_path($this->name, '/routes/web.php'));
    }
}
