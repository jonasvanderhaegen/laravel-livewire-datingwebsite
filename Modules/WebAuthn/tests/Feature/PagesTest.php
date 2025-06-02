<?php

declare(strict_types=1);

use Illuminate\Support\Facades\RateLimiter;
use Modules\WebAuthn\Livewire\Pages\Login;
use Modules\WebAuthn\Livewire\Pages\LostPasskey;
use Modules\WebAuthn\Livewire\Pages\Register;
use Modules\WebAuthn\Livewire\Pages\ResetPasskey;

// use Nwidart\Modules\Facades\Module;

// name it whatever makes sense—you can even scope by directory
dataset('auth pages', [
    'lost passkey' => [
        'routeName' => 'passkey.request',
        'componentClass' => LostPasskey::class,
        'limit' => 10,
    ],
    'reset passkey' => [
        'routeName' => 'passkey.reset',
        'componentClass' => ResetPasskey::class,
        'limit' => 10,
    ],
    'login' => [
        'routeName' => 'login',
        'componentClass' => Login::class,
        'limit' => 10,
    ],
    'register' => [
        'routeName' => 'register',
        'componentClass' => Register::class,
        'limit' => 10,
    ],

]);

// 2) Shared setup (if needed)
beforeEach(function (): void {
    if (Module::find('WebAuthn')->isDisabled()) {
        $this->markTestSkipped('WebAuthn module is disabled');
    }
    RateLimiter::clear('guest-auth:'.request()->ip());
});

it('renders the Livewire component', function (
    string $routeName,
    string $componentClass,
    int $limit
) {
    Livewire::test($componentClass)
        ->assertStatus(200);
})->with('auth pages');

it('responds OK over HTTP', function (
    string $routeName,
    string $componentClass,
    int $limit
) {
    $this->get(route($routeName))
        ->assertOk();
})->with('auth pages');

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
})->with('auth pages');
