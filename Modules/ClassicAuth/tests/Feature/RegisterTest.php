<?php

declare(strict_types=1);

use App\Models\User;
use Livewire\Livewire;
use Modules\ClassicAuth\Livewire\Register;
use Nwidart\Modules\Facades\Module;

beforeEach(function (): void {
    if (Module::find('ClassicAuth')->isDisabled()) {
        $this->markTestSkipped('ClassicAuth module is disabled');
    } else {
        $this->correctFirstName = 'John';
        $this->correctLastName = 'Doe';
        $this->correctEmail = 'test@example.com';
        $this->correctPassword = 'P@ssword123!123456';
        $this->correctDob = '01-01-2000';
        $this->correctConfirm = true;

        $this->incorrectName = fake()->name();
        $this->incorrectEmail = 'test@';
        $this->incorrectPassword = 'password';
        $this->incorrectConfirm = false;
    }
});

test('register using the RegisterForm on Register Component is successful', function () {

    $response = Livewire::test(Register::class)
        ->set('form.firstname', $this->correctFirstName)
        ->set('form.lastname', $this->correctLastName)
        ->set('form.email', $this->correctEmail)
        ->set('form.password', $this->correctPassword)
        ->set('form.dob', $this->correctDob)
        ->set('form.terms', $this->correctConfirm)
        ->call('submit');

    $this->assertDatabaseHas('users', [
        'email' => $this->correctEmail,
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('protected.discover', absolute: false));
});

test('cannot register with an email that is already taken', function () {
    $existing = User::factory()->create();

    Livewire::test(Register::class)
        ->set('form.firstname', $this->correctFirstName)
        ->set('form.lastname', $this->correctLastName)
        ->set('form.email', $existing->email)
        ->set('form.password', $this->correctPassword)
        ->set('form.dob', $this->correctDob)
        ->set('form.terms', $this->correctConfirm)
        ->call('submit')
        ->assertHasErrors([
            'form.email' => 'unique',
        ]);
});

test('cannot register with an email that is incorrect', function () {

    Livewire::test(Register::class)
        ->set('form.firstname', $this->correctFirstName)
        ->set('form.lastname', $this->correctLastName)
        ->set('form.email', $this->incorrectEmail)
        ->set('form.password', $this->correctPassword)
        ->set('form.dob', $this->correctDob)
        ->set('form.terms', $this->correctConfirm)
        ->call('submit')
        ->assertHasErrors([
            'form.email',
        ]);
});
