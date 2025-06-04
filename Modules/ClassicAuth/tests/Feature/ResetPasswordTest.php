<?php

declare(strict_types=1);

use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Livewire\Livewire;
use Modules\ClassicAuth\Livewire\Reset;
use Nwidart\Modules\Facades\Module;

beforeEach(function (): void {
    if (Module::find('ClassicAuth')->isDisabled()) {
        $this->markTestSkipped('ClassicAuth module is disabled');
    }
    $this->dummyToken = Str::random(64);
    $this->email = fake()->email;
    RateLimiter::clear('guest-auth:'.request()->ip());

    // reset Livewire & HTTP state if needed
    // e.g. clear session, middleware, etc.
});

it('renders the Reset Password Livewire component successfully', function () {
    Livewire::withQueryParams([
        'token' => $this->dummyToken,
        'email' => $this->email,
    ])
        ->test(Reset::class)
        ->assertStatus(200);
});

it('can GET the Reset Password route via query string', function () {
    $url = route('password.reset', [
        'token' => $this->dummyToken,
        'email' => $this->email,
    ]);

    $this->get($url)
        ->assertOk(); // 200
});

it('allows route up to the throttle limit and then returns 429', function () {
    $limit = 10;

    $url = route('password.reset', [
        'token' => Str::random(64),
        'email' => fake()->email,
    ]);

    // Hit the route exactly $limit times → should be OK
    for ($i = 1; $i <= $limit; ++$i) {
        $this->get($url)->assertStatus(200);
    }

    // One more → should now be rate-limited
    $this->get($url)->assertStatus(429);
});
