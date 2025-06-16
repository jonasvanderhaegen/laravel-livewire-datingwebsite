<?php

declare(strict_types=1);

namespace Modules\Statistics\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Concerns\HasSamePrimaryServiceProviderFunctions;
use Modules\Statistics\Console\RefreshUserDensity;

final class PrimaryServiceProvider extends ServiceProvider
{
    use HasSamePrimaryServiceProviderFunctions;

    protected string $name = 'Statistics';

    protected string $nameLower = 'statistics';

    /**
     * Boot the application events.
     */
    public function boot(): void
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerCommands();
        $this->loadMigrationsFrom(module_path($this->name, 'database/migrations'));
    }

    public function registerCommands(): void
    {
        $this->commands([
            RefreshUserDensity::class,
        ]);
    }

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->app->register(EventServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);

    }
}
