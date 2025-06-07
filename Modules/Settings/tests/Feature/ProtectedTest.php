<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Support\Facades\RateLimiter;
use Modules\Settings\Livewire\Pages\Account;
use Modules\Settings\Livewire\Pages\Images;
use Modules\Settings\Livewire\Pages\Preferences;
use Modules\Settings\Livewire\Pages\Profile;

// name it whatever makes sense—you can even scope by directory
dataset('settings pages', [
    'account' => [
        'routeName' => 'settings.account',
        'componentClass' => Account::class,
        'limit' => 30,
    ],
    'profile' => [
        'routeName' => 'settings.profile',
        'componentClass' => Profile::class,
        'limit' => 30,
    ],
    'preferences' => [
        'routeName' => 'settings.preferences',
        'componentClass' => Preferences::class,
        'limit' => 30,
    ],
    'images' => [
        'routeName' => 'settings.images',
        'componentClass' => Images::class,
        'limit' => 30,
    ],
    'profile preview' => [
        'routeName' => 'settings.profile-preview',
        'componentClass' => Modules\Settings\Livewire\Pages\ProfilePreview::class,
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
})->with('settings pages');

it('responds OK over HTTP', function (
    string $routeName,
    string $componentClass,
    int $limit
) {
    $this->get(route($routeName))
        ->assertOk();
})->with('settings pages');

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
})->with('settings pages');
