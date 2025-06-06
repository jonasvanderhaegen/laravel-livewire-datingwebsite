<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Support\Facades\RateLimiter;
use Modules\Browser\Livewire\Pages\Index;
use Modules\Browser\Livewire\Pages\Likes;
use Modules\Browser\Livewire\Pages\Show;

// name it whatever makes sense—you can even scope by directory
dataset('info pages', [
    'browser index' => [
        'routeName' => 'browser.index',
        'componentClass' => Index::class,
        'limit' => 30,
    ],
    'browser show profile' => [
        'routeName' => 'browser.show',
        'componentClass' => Show::class,
        'limit' => 30,
    ],
    'browser show likes' => [
        'routeName' => 'browser.likes',
        'componentClass' => Likes::class,
        'limit' => 30,
    ],
]);

// 2) Shared setup (if needed)
beforeEach(function (): void {
    $this->actingAs(User::factory()
        ->create([
            'email_verified_at' => now(),
        ]));

    RateLimiter::clear('info-pages:'.$this->app['request']->ip());
});

it('renders the Livewire component', function (
    string $routeName,
    string $componentClass,
    int $limit
) {
    Livewire::test($componentClass)
        ->assertStatus(200);
})->with('info pages');

it('responds OK over HTTP', function (
    string $routeName,
    string $componentClass,
    int $limit
) {
    $this->get(route($routeName))
        ->assertOk();
})->with('info pages');
