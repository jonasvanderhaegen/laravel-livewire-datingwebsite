<?php

declare(strict_types=1);

namespace Modules\ClassicAuth\Livewire;

use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Masmerise\Toaster\Toaster;
use Modules\ClassicAuth\Livewire\Forms\RegisterForm;
use Modules\Core\Exceptions\TooManyRequestsException;
use Modules\CustomTheme\Livewire\Layouts\General;

// @codeCoverageIgnoreStart
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

            // if we get here, registration succeeded
            $this->redirectRoute('protected.discover', navigate: true);

            Session::flash('status', 'verification-link-sent');
        } catch (TooManyRequestsException $e) {
            Toaster::error($e->getMessage());
            $this->form->secondsUntilReset = $e->secondsUntilAvailable;

            $this->addError(
                'form.email',
                __('auth.throttle', [
                    'seconds' => $e->secondsUntilAvailable,
                    'minutes' => ceil($e->minutesUntilAvailable),
                ])
            );
        } catch (ValidationException $e) {
            Toaster::error(__('auth.failed'));
            throw $e;
        }
    }

    public function updatedFormEmail(): void
    {
        $this->validateOnly('form.email');
    }

    public function updatedFormPassword(): void
    {
        $this->validateOnly('form.password');
    }

    public function updatedFormDob(): void
    {
        $this->validateOnly('form.dob');
    }

    public function render(): View
    {
        return view('classicauth::livewire.register')
            ->title(__('Register'));
    }
}
// @codeCoverageIgnoreEnd
