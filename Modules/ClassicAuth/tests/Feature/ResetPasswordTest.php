<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Livewire\Livewire;
use Modules\ClassicAuth\Livewire\Reset;
use Nwidart\Modules\Facades\Module;

beforeEach(function (): void {
    if (Module::find('ClassicAuth')->isDisabled()) {
        $this->markTestSkipped('ClassicAuth module is disabled');
    }

    $this->email = fake()->email;
    $this->token = Str::random(64);
    RateLimiter::clear('guest-auth:'.request()->ip());
});

// 1) MOUNT-LEVEL REDIRECTS
it('redirects to request page when no token provided', function () {
    Livewire::withQueryParams([
        'email' => $this->email,
        'token' => '',
    ])
        ->test(Reset::class)
        ->assertRedirect(route('password.request'));
});

it('allows access when URL is validly signed', function () {
    $signed = URL::temporarySignedRoute(
        'password.reset',
        now()->addMinutes(60),
        ['email' => $this->email, 'token' => $this->token]
    );

    $this->get($signed)
        ->assertOk()
        ->assertSeeLivewire(Reset::class);
});

// 3) HAPPY-PATH MOUNT + SIGNATURE
it('renders Livewire component when signed & user exists', function () {
    // Create a user for valid flow
    $user = User::factory()->create(['email' => $this->email]);

    $token = 'valid-reset-token';
    $signed = URL::temporarySignedRoute(
        'password.reset',
        now()->addMinutes(60),
        ['email' => $user->email, 'token' => $token]
    );

    // Pass middleware
    $this->get($signed)->assertOk();

    // Extract signature and expires from URL
    $parsed = Request::create($signed)->query();

    Livewire::withQueryParams([
        'email' => $user->email,
        'token' => $token,
        'expires' => $parsed['expires'] ?? null,
        'signature' => $parsed['signature'] ?? null,
    ])
        ->test(Reset::class)
        ->assertStatus(200);
});
