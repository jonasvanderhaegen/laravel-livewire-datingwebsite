<?php

declare(strict_types=1);

namespace Modules\Core\Providers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use NunoMaduro\Essentials\Commands\EssentialsPintCommand;
use NunoMaduro\Essentials\Commands\MakeActionCommand;
use NunoMaduro\Essentials\Configurables\AggressivePrefetching;
use NunoMaduro\Essentials\Configurables\AutomaticallyEagerLoadRelationships;
use NunoMaduro\Essentials\Configurables\FakeSleep;
use NunoMaduro\Essentials\Configurables\ForceScheme;
use NunoMaduro\Essentials\Configurables\ImmutableDates;
use NunoMaduro\Essentials\Configurables\PreventStrayRequests;
use NunoMaduro\Essentials\Configurables\ProhibitDestructiveCommands;
use NunoMaduro\Essentials\Configurables\SetDefaultPassword;
use NunoMaduro\Essentials\Configurables\ShouldBeStrict;
use NunoMaduro\Essentials\Contracts\Configurable;

/**
 * @internal
 */
final class EssentialsServiceProvider extends BaseServiceProvider
{
    /**
     * The list of configurables.
     *
     * @var list<class-string<Configurable>>
     */
    private array $configurables = [
        ForceScheme::class,
        AggressivePrefetching::class,
        AutomaticallyEagerLoadRelationships::class,
        FakeSleep::class,
        ImmutableDates::class,
        PreventStrayRequests::class,
        ProhibitDestructiveCommands::class,
        SetDefaultPassword::class,
        ShouldBeStrict::class,
    ];

    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        collect($this->configurables)
            ->map(fn (string $configurable) => $this->app->make($configurable))
            ->each(fn (Configurable $configurable) => $configurable->configure());

        if ($this->app->runningInConsole()) {
            $this->commands([
                EssentialsPintCommand::class,
                MakeActionCommand::class,
            ]);

            $this->publishes([
                __DIR__.'/../stubs' => $this->app->basePath('stubs'),
            ], 'core::essentials-stubs');
        }
    }
}
