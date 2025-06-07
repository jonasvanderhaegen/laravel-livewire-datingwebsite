<?php

declare(strict_types=1);

namespace Modules\OnboardUser\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Concerns\HasSamePrimaryServiceProviderFunctions;
use Spatie\Onboard\Facades\Onboard;

final class PrimaryServiceProvider extends ServiceProvider
{
    use HasSamePrimaryServiceProviderFunctions;

    protected string $name = 'OnboardUser';

    protected string $nameLower = 'onboarduser';

    /**
     * Boot the application events.
     */
    public function boot(): void
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->name, 'database/migrations'));
        $this->registerMacros();
        $this->registerSteps();
    }

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->app->register(EventServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
    }

    protected function registerMacros(): void
    {
        Factory::macro('verifiedAndOnboarded', fn () => $this->state(fn (array $attrs) => [
            'onboarding_complete' => true,
            'onboarding_steps' => ['location' => true, 'profile' => true, 'final' => true],
        ]));
    }

    protected function registerSteps(): void
    {
        foreach (config('onboarduser.steps') as $key => $opts) {
            Onboard::addStep($opts['label'])
                ->link($opts['route'])
                ->cta($opts['cta'] ?? 'Next')
                ->completeIf(fn (User $model
                ) => $model->hasOnboardingStep($opts['complete'] ?? $key));
        }
    }
}
