<?php

declare(strict_types=1);

use App\Models\User;
use Livewire\Livewire;
use Modules\ClassicAuth\Livewire\Login;
use Nwidart\Modules\Facades\Module;

beforeEach(function (): void {
    if (Module::find('ClassicAuth')->isDisabled()) {
        $this->markTestSkipped('ClassicAuth module is disabled');
    }
    $this->user = User::factory()->create();
});

test('users can authenticate using the login screen', function () {

    $response = Livewire::test(Login::class)
        ->set('form.email', $this->user->email)
        ->set('form.password', 'password')
        ->call('submit');

    $this->assertAuthenticated();
    $response->assertRedirect(route('protected.discover', absolute: false));
});

test('users cannot authenticate with invalid password', function () {

    Livewire::test(Login::class)
        ->set('form.email', $this->user->email)
        ->set('form.password', 'wrong-password')
        ->call('submit');

    $this->assertGuest();
});

test('rate limit after 5 attempts', function () {

    $lw = Livewire::test(Login::class)
        ->set('form.email', $this->user->email)
        ->set('form.password', 'wrong-password')
        ->call('submit');

    // Make 5 bad attempts:
    for ($i = 0; $i < 5; ++$i) {
        $lw->set('form.password', 'wrong')
            ->call('submit')
            ->assertHasErrors('form.email');
    }

    // 6th attempt should trigger the TooManyRequestsException handling:
    $lw->set('form.password', 'wrong')
        ->call('submit')
        ->assertHasErrors('form.email')
        ->assertSee(__('auth.throttle', [
            'seconds' => $seconds = $lw->instance()->form->secondsUntilReset,
            'minutes' => ceil($seconds / 60),
        ]));

    expect($seconds)->toBeLessThanOrEqual(60);
});

test('rate limit after 15 attempts', function () {

    $lw = Livewire::test(Login::class)
        ->set('form.email', $this->user->email)
        ->set('form.password', 'wrong-password')
        ->call('submit');

    // Make 5 bad attempts:
    for ($i = 0; $i < 15; ++$i) {
        $lw->set('form.password', 'wrong')
            ->call('submit')
            ->assertHasErrors('form.email');
        $this->travel(61)->seconds();
    }

    // 6th attempt should trigger the TooManyRequestsException handling:
    $lw->set('form.password', 'wrong')
        ->call('submit')
        ->assertHasErrors('form.email')
        ->assertSee(__('auth.throttle', [
            'seconds' => $lw->instance()->form->secondsUntilReset,
            'minutes' => ceil($lw->instance()->form->secondsUntilReset / 60),
        ]));
    expect($lw->instance()->form->secondsUntilReset)->toBeGreaterThan(60);
});
