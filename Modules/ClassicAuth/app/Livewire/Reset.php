<?php

declare(strict_types=1);

namespace Modules\ClassicAuth\Livewire;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Url;
use Masmerise\Toaster\Toaster;
use Modules\ClassicAuth\Livewire\Forms\ResetPasswordForm;
use Modules\Core\Exceptions\TooManyRequestsException;
use Modules\CustomTheme\Livewire\Layouts\General;

final class Reset extends General
{
    public ResetPasswordForm $form;

    #[Url]
    #[Locked]
    public string $token = '';

    #[Url]
    #[Locked]
    public string $email = '';

    public bool $showPassword = false;

    public function render(): View
    {
        /** @var view-string $viewName */
        $viewName = 'classicauth::livewire.reset';

        return view($viewName)
            ->title(__('Reset password'));
    }

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        if (empty($this->token) && empty($this->email)) {
            Toaster::error(__('There was no token and/or e-mail provided'));

            $this->redirectIntended(
                default: route('password.request', absolute: false),
                navigate: true
            );
        }

        $this->form->token = $this->token;
        $this->form->email = $this->email;
    }

    public function submit(): void
    {
        try {
            // This will throw TooManyRequestsException if over the limit,
            // or ValidationException on invalid token/email/password.
            $this->form->resetPassword();

            Toaster::success(__('auth.reset-password.success'));

            $this->redirectIntended(
                default: route('settings.account', absolute: false),
                navigate: false
            );
        } catch (TooManyRequestsException $e) {
            // Show the countdown in your UI
            $this->form->secondsUntilReset = $e->secondsUntilAvailable;

            // Add a field error so the user sees why they’re blocked
            Toaster::error(__('Too many attempts, wait for :minutes minutes', [
                'minutes' => $e->minutesUntilAvailable,
            ]));
        } catch (ValidationException $e) {
            // Let Livewire render the validation errors (invalid token, etc.)
            if ($e->getMessage() === Password::INVALID_TOKEN) {
                Toaster::error(__($e->getMessage()));
                Session::flash('status', 'password-reset-token-invalid');

                $this->redirectRoute('password.request');
            } else {
                Toaster::error($e->getMessage());
            }
        }
    }

    public function toggleShowPassword(): void
    {
        $this->showPassword = ! $this->showPassword;
    }

    public function updatedFormEmail(): void
    {
        $this->validateOnly('form.email');
    }

    public function updatedFormPassword(): void
    {
        $this->validateOnly('form.password');
    }
}
