<?php

declare(strict_types=1);

namespace Modules\ClassicAuth\Livewire;

use Illuminate\Validation\ValidationException;
use Masmerise\Toaster\Toaster;
use Modules\ClassicAuth\Livewire\Forms\LoginForm;
use Modules\Core\Exceptions\TooManyRequestsException;
use Modules\CustomTheme\Livewire\Layouts\General;

final class Login extends General
{
    public LoginForm $form;

    public bool $showPassword = false;

    public function render()
    {
        return view('classicauth::livewire.login')
            ->title(__('Login'));
    }

    public function mount(): void
    {
        $this->form->initRateLimitCountdown('attemptLogin', null, 'login');
    }

    public function toggleShowPassword(): void
    {
        $this->showPassword = ! $this->showPassword;
    }

    public function updatedFormEmail(): void
    {
        $this->validateOnly('form.email');
    }

    public function submit()
    {
        try {
            $this->form->initRateLimitCountdown('attemptLogin', null, 'login');
            $this->form->attemptLogin();

            Toaster::success('auth.login.success');
            // if we get here, login succeeded
            $this->redirectIntended(
                default: route('protected.discover', absolute: false),
                navigate: false
            );

        } catch (TooManyRequestsException $e) {

            Toaster::error($e->getMessage());
            $this->form->secondsUntilReset = $e->secondsUntilAvailable;

            $this->addError('form.email', __('auth.throttle', [
                'seconds' => $e->secondsUntilAvailable,
                'minutes' => ceil($e->minutesUntilAvailable),
            ]));

        } catch (ValidationException $e) {
            // Invalid credentials — the exception already has the right message

            Toaster::error($e->getMessage());

            // re-throw so Livewire picks up the validation error
            throw $e;
        }
    }
}
