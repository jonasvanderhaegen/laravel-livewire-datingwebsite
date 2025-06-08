<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Support\Facades\URL;
use Livewire\Livewire;
use Modules\WebAuthn\Livewire\Pages\ResetPasskey;

// 1) MOUNT-LEVEL REDIRECTS
it('redirects to request page when no token is provided', function () {
    Livewire::withQueryParams([
        'email' => 'test@example.com',
        'token' => '',
    ])
        ->test(ResetPasskey::class)
        ->assertRedirect(route('passkey.request'));
});

it('redirects to request page when user not found', function () {
    Livewire::withQueryParams([
        'email' => 'noone@nowhere.test',
        'token' => 'some-token',
    ])
        ->test(ResetPasskey::class)
        ->assertRedirect(route('passkey.request'));
});

// 2) SIGNED-URL MIDDLEWARE
it('forbids access when URL signature is invalid', function () {
    $unsig = route('passkey.reset', [
        'email' => 'foo@bar.test',
        'token' => 'abc123',
        'expires' => now()->addMinutes(60)->timestamp,
        'signature' => 'bad-signature',
    ]);

    $this->get($unsig)
        ->assertForbidden();
});

it('allows access when URL is validly signed', function () {
    $user = User::factory()->create();
    $token = 'reset-token-xyz';

    $signed = URL::temporarySignedRoute(
        'passkey.reset',
        now()->addMinutes(60),
        ['email' => $user->email, 'token' => $token]
    );

    $this->get($signed)
        ->assertOk()
        ->assertSeeLivewire(ResetPasskey::class);
});

// 3) HAPPY-PATH MOUNT + SIGNATURE
it('renders the Livewire component when signed & user exists', function () {
    $user = User::factory()->create();
    $token = 'another-token';

    $signed = URL::temporarySignedRoute(
        'passkey.reset',
        now()->addMinutes(60),
        ['email' => $user->email, 'token' => $token]
    );

    // First hit the route to pass the middleware
    $this->get($signed)->assertOk();

    // Then mount the component via Livewire (with the same query string)
    Livewire::withQueryParams([
        'email' => $user->email,
        'token' => $token,
        'expires' => now()->addMinutes(60)->timestamp,
        'signature' => Illuminate\Http\Request::create($signed)->query('signature'),
    ])
        ->test(ResetPasskey::class)
        ->assertStatus(200);
});
