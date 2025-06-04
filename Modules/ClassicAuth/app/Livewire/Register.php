<?php

declare(strict_types=1);

namespace Modules\ClassicAuth\Livewire;

use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Masmerise\Toaster\Toaster;
use Modules\ClassicAuth\Livewire\Forms\RegisterForm;
use Modules\Core\Exceptions\TooManyRequestsException;
use Modules\CustomTheme\Livewire\Layouts\General;

// use Livewire\Component;

final class Register extends General
{
    public RegisterForm $form;

    public bool $showPassword = false;

    public function toggleShowPassword(): void
    {
        $this->showPassword = ! $this->showPassword;
    }

    public function mount(): void
    {
        $this->form->name = fake('nl_BE')->name();
        $this->form->email = fake('nl_BE')->email();
        $this->form->password = 'M@trix3017';
        $this->form->dob = '23-04-1991';
        $this->form->confirm = true;

        $this->form->initRateLimitCountdown('attemptRegister', null, 'register');
    }

    public function submit(): void
    {
        try {
            $this->form->attemptRegister();
            $this->form->initRateLimitCountdown('attemptRegister', null, 'register');

            // if we get here, register succeeded
            $this->redirectRoute('protected.discover', navigate: true);

            Session::flash('status', 'verification-link-sent');

        } catch (TooManyRequestsException $e) {

            Toaster::error($e->getMessage());
            $this->form->secondsUntilReset = $e->secondsUntilAvailable;

            $this->addError('form.email', __('auth.throttle', [
                'seconds' => $e->secondsUntilAvailable,
                'minutes' => ceil($e->minutesUntilAvailable),
            ]));

            // throw a ValidationException so Livewire won't swallow the error
            // throw ValidationException::withMessages([
            //     'form.email' => $e->getMessage(),
            // ]);

        } catch (ValidationException $e) {
            // Invalid credentials — the exception already has the right message
            Toaster::error('auth.failed');

            // re-throw so Livewire picks up the validation error
            throw $e;
        }
    }

    public function updatedFormEmail()
    {
        $this->validateOnly('form.email');
    }

    public function updatedFormPassword()
    {
        $this->validateOnly('form.password');
    }

    public function updatedFormDob()
    {
        $this->validateOnly('form.dob');
    }

    public function render()
    {
        return view('classicauth::livewire.register')
            ->title(__('Register'));

    }
}
