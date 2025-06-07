<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Support\Facades\RateLimiter;

// name it whatever makes sense—you can even scope by directory
dataset('onboarding pages', [
    'step1' => [
        'routeName' => 'onboard.step1',
        'componentClass' => Modules\OnboardUser\Livewire\Step1::class,
        'limit' => 30,
    ],

    'step2' => [
        'routeName' => 'onboard.step2',
        'componentClass' => Modules\OnboardUser\Livewire\Step2::class,
        'limit' => 30,
    ],
    'step3' => [
        'routeName' => 'onboard.step3',
        'componentClass' => Modules\OnboardUser\Livewire\Step3::class,
        'limit' => 30,
    ],
    'step4' => [
        'routeName' => 'onboard.step4',
        'componentClass' => Modules\OnboardUser\Livewire\Step4::class,
        'limit' => 30,
    ],
    'finalstep' => [
        'routeName' => 'onboard.finalstep',
        'componentClass' => Modules\OnboardUser\Livewire\Finalstep::class,
        'limit' => 30,
    ],

]);

beforeEach(function (): void {
    RateLimiter::clear('user-actions:'.$this->app['request']->ip());

    $user = User::factory()
        ->verifiedAndOnboarded()
        ->hasProfile()
        ->create();

    $this->actingAs($user);
});

it('renders the Livewire component', function (
    string $routeName,
    string $componentClass,
    int $limit
) {
    Livewire::test($componentClass)
        ->assertStatus(200);
})->with('onboarding pages');

it('responds OK over HTTP', function (
    string $routeName,
    string $componentClass,
    int $limit
) {
    $this->get(route($routeName))
        ->assertOk();
})->with('onboarding pages');

it('throttles after the configured limit', function (
    string $routeName,
    string $componentClass,
    int $limit
) {
    $url = route($routeName);

    for ($i = 1; $i <= $limit; ++$i) {
        $this->get($url)->assertStatus(200);
    }

    $this->get($url)->assertStatus(429);
})->with('onboarding pages');
