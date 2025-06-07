<?php

declare(strict_types=1);

use App\Models\User;
use Modules\WebAuthn\Policies\PasskeyPolicy;
use Spatie\LaravelPasskeys\Models\Passkey;

beforeEach(function () {
    $this->policy = new PasskeyPolicy();
    $this->user = new User;
});

it('denies delete when the passkey does not belong to the user', function () {
    $this->user->id = 1;
    $this->user->passkeys_count = 10;

    $passkey = new Passkey;
    $passkey->authenticatable_id = 2; // different user

    expect($this->policy->delete($this->user, $passkey))->toBeFalse();
});

it('denies delete when user only has one passkey even if it belongs to them', function () {
    $this->user->id = 1;
    $this->user->passkeys_count = 1;

    $passkey = new Passkey;
    $passkey->authenticatable_id = 1;

    expect($this->policy->delete($this->user, $passkey))->toBeFalse();
});

it('allows delete when passkey belongs to user and they have more than one', function () {
    $this->user->id = 42;
    $this->user->passkeys_count = 3;

    $passkey = new Passkey;
    $passkey->authenticatable_id = 42;

    expect($this->policy->delete($this->user, $passkey))->toBeTrue();
});

it('allows create when user has fewer than six passkeys', function () {
    $this->user->passkeys_count = 5;
    expect($this->policy->create($this->user))->toBeTrue();
});

it('denies create when user already has six or more passkeys', function () {
    $this->user->passkeys_count = 6;
    expect($this->policy->create($this->user))->toBeFalse();
});
