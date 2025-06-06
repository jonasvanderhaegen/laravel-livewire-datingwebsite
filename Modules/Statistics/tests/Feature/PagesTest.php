<?php

declare(strict_types=1);

use Illuminate\Support\Facades\RateLimiter;

// name it whatever makes sense—you can even scope by directory
dataset('pages', [
    'statistics overview' => [
        'routeName' => 'statistics',
        'componentClass' => Modules\Statistics\Livewire\Pages\Index::class,
        'limit' => 60,
    ],
]);

// 2) Shared setup (if needed)
beforeEach(function (): void {
    RateLimiter::clear('info-pages:'.$this->app['request']->ip());
});

it('renders the Livewire component', function (
    string $routeName,
    string $componentClass,
    int $limit
) {
    Livewire::test($componentClass)
        ->assertStatus(200);
})->with('pages');

it('responds OK over HTTP', function (
    string $routeName,
    string $componentClass,
    int $limit
) {
    $this->get(route($routeName))
        ->assertOk();
})->with('pages');

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
})->with('pages');
