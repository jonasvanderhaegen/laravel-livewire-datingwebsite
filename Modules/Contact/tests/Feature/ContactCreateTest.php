<?php

declare(strict_types=1);

use Illuminate\Support\Facades\RateLimiter;
use Modules\Contact\Livewire\Pages\Contact;

// name it whatever makes sense—you can even scope by directory
dataset('contact pages', [
    'Contact' => [
        'routeName' => 'contact.create',
        'componentClass' => Contact::class,
        'limit' => 5,
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
})->with('contact pages');

it('responds OK over HTTP', function (
    string $routeName,
    string $componentClass,
    int $limit
) {
    $this->get(route($routeName))
        ->assertOk();
})->with('contact pages');

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
})->with('contact pages');

test('contactform submit', function () {

    $response = Livewire::test(Contact::class)
        ->set('form.name', 'test')
        ->set('form.email', fake()->email)
        ->set('form.message', 'test')
        ->call('submit')
        ->assertOk();

    ray($response);

});
