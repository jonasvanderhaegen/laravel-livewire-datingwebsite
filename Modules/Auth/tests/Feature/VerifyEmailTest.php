<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Event;
use Livewire\Livewire;
use Modules\Auth\Livewire\VerifyEmail;

beforeEach(function (): void {

    if (! in_array(MustVerifyEmail::class, class_implements(User::class), true)) {
        $this->markTestSkipped('User model does not implement MustVerifyEmail.');
    }

    $this->user = User::factory()->unverified()->create();
    $this->actingAs($this->user);

});

it('renders Verify Email page successfully', function () {

    Livewire::test(VerifyEmail::class)
        ->assertStatus(200);
});

it('can get to the route of "Verify Email"', function () {

    $this->get(route('verification.notice'))->assertOk();
});

test('email can be verified', function () {

    Event::fake();

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $this->user->id, 'hash' => sha1($this->user->email)]
    );

    $response = $this->actingAs($this->user)->get($verificationUrl);

    Event::assertDispatched(Verified::class);

    expect($this->user->fresh()->hasVerifiedEmail())->toBeTrue();
    $response->assertRedirect(route('protected.discover', absolute: false).'?verified=1');
});

test('email is not verified with invalid hash', function () {

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $this->user->id, 'hash' => sha1('wrong-email')]
    );

    $this->actingAs($this->user)->get($verificationUrl);

    expect($this->user->fresh()->hasVerifiedEmail())->toBeFalse();
});
