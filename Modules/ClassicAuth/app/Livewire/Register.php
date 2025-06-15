<?php

declare(strict_types=1);

namespace Modules\ClassicAuth\Livewire;

use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Masmerise\Toaster\Toaster;
use Modules\ClassicAuth\Livewire\Forms\RegisterForm;
use Modules\Core\Concerns\HasMobileDesktopViews;
use Modules\Core\Exceptions\TooManyRequestsException;
use Modules\CustomTheme\Livewire\Layouts\General;

// @codeCoverageIgnoreStart
final class Register extends General
{
    use HasMobileDesktopViews;

    public RegisterForm $form;

    public bool $showPassword = false;

    public function toggleShowPassword(): void
    {
        $this->showPassword = ! $this->showPassword;
    }

    public function mount(): void
    {
        $this->form->firstname = fake('nl_BE')->firstName();
        $this->form->lastname = fake('nl_BE')->lastName();
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

    #[Computed]
    public function isFormValid(): bool
    {
        return $this->isMobile() || ! $this->getErrorBag()->any()
            && $this->form->firstname !== ''
            && $this->form->lastname !== ''
            && $this->form->email !== ''
            && $this->form->dob !== ''
            && $this->form->terms;
    }

    public function updated(string $field): void
    {
        $this->validateOnly($field);
    }

    public function render(): View
    {
        return view("classicauth::livewire.{$this->addTo('register')}")
            ->title(__('Register'));
    }
}
// @codeCoverageIgnoreEnd
