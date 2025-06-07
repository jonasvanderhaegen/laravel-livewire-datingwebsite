<?php

use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Settings\Livewire\Actions\DeletePasskey;
use Spatie\LaravelPasskeys\Models\Passkey;

uses(RefreshDatabase::class);

beforeEach(function () {
});

it('forbids deleting another user’s passkey', function () {
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();
    $this->actingAs($user1, 'web');

    // Passkey belonging to someone else
    $other = Passkey::factory()->for($user2, 'authenticatable')->create();

    // Should throw an authorization exception
    app(DeletePasskey::class)($other);
})->throws(AuthorizationException::class);
