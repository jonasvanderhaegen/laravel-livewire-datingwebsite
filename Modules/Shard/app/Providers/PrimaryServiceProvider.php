<?php

declare(strict_types=1);

namespace Modules\Shard\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Concerns\HasSamePrimaryServiceProviderFunctions;
use Modules\Shard\Actions\ResolveUserShard;
use Modules\Shard\Console\MigrateShards;

final class PrimaryServiceProvider extends ServiceProvider
{
    use HasSamePrimaryServiceProviderFunctions;

    protected string $name = 'Shard';

    protected string $nameLower = 'shard';

    /**
     * Boot the application events.
     */
    public function boot(): void
    {
        $this->registerCommands();
        $this->registerCommandSchedules();
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->name, 'database/migrations'));
        $this->mergeConfigForDatabaseConnections();

        Auth::provider('sharded', function ($app, array $config) {
            // $app['hash'] resolves to the Hasher implementation
            return new ShardUserProvider(
                $app['hash'],         // Illuminate\Contracts\Hashing\Hasher
                $config['model'],      // App\Models\User::class
                $app->make(ResolveUserShard::class),   // your ResolveUserShard action

            );
        });
    }

    public function mergeConfigForDatabaseConnections(): void
    {
        config([
            'database.connections' => array_merge(
                config('database.connections', []),
                config('shard.database.connections', [])
            ),
            'auth.providers.users' => array_merge(
                config('auth.providers.users', []),
                config('shard.auth.providers.users', [])
            ),
        ]);
    }

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->app->register(EventServiceProvider::class);
        // $this->app->register(ShardUserProvider::class);
    }

    /**
     * Register commands in the format of Command::class
     */
    protected function registerCommands(): void
    {
        $this->commands([
            MigrateShards::class,
        ]);
    }

    /**
     * Register command Schedules.
     */
    protected function registerCommandSchedules(): void
    {
        // $this->app->booted(function () {
        //     $schedule = $this->app->make(Schedule::class);
        //     $schedule->command('inspire')->hourly();
        // });
    }
}
