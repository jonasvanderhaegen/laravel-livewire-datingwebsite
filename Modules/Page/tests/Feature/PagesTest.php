<?php

declare(strict_types=1);

use Illuminate\Support\Facades\RateLimiter;
use Modules\Page\Livewire\Pages\Home;
use Modules\Page\Livewire\Pages\TermsConditions;

// name it whatever makes sense—you can even scope by directory
dataset('web pages', [
    'home' => [
        'routeName' => 'home',
        'componentClass' => Home::class,
        'limit' => 60,
    ],
    'terms and conditions' => [
        'routeName' => 'terms-and-conditions',
        'componentClass' => TermsConditions::class,
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
})->with('web pages');

it('responds OK over HTTP', function (
    string $routeName,
    string $componentClass,
    int $limit
) {
    $this->get(route($routeName))
        ->assertOk();
})->with('web pages');

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
})->with('web pages');
