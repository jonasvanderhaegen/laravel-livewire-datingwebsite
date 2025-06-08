<?php

declare(strict_types=1);

namespace Modules\WebAuthn\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Concerns\HasSamePrimaryServiceProviderFunctions;

final class PrimaryServiceProvider extends ServiceProvider
{
    use HasSamePrimaryServiceProviderFunctions;

    protected string $name = 'WebAuthn';

    protected string $nameLower = 'webauthn';

    /**
     * Boot the application events.
     */
    public function boot(): void
    {
        $this->registercommands();
        $this->registerTranslations();
        $this->registerConfig();
        $this->mergeConfigForPasswordBroker();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->name, 'database/migrations'));
    }

    public function mergeConfigForPasswordBroker(): void
    {
        config([
            'auth.passwords' => array_merge(
                config('auth.passwords', []),
                config('webauthn.auth.passwords', [])
            ),
        ]);
    }

    public function registerCommands(): void
    {
        $this->commands([]);
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
