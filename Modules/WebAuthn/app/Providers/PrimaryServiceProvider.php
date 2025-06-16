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
        $this->overrideSpatieActions();
        $this->overrideSpatieOneTimePasswordConfig();

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

    public function overrideSpatieOneTimePasswordConfig(): void
    {
        config([
            'one-time-passwords' => array_merge(
                config('one-time-passwords', []),
                config('webauthn.one-time-passwords', [])
            ),
        ]);
    }

    public function overrideSpatieActions(): void
    {
        config([
            'passkeys.actions' => array_merge(
                config('passkeys.actions', []),
                config('webauthn.passkeys.actions', [])
            ),
            'passkeys.models' => array_merge(
                config('passkeys.models', []),
                config('webauthn.passkeys.models', [])
            ),
        ]);

        // ray(config('passkeys'));
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
        $this->app->register(AuthServiceProvider::class);
        $this->app->register(EventServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
    }
}
