<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Components\Account;

use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Masmerise\Toaster\Toaster;
use Modules\Core\Concerns\HasMobileDesktopViews;
use Modules\Core\Exceptions\TooManyRequestsException;
use Modules\Settings\Livewire\Forms\Account\UpdatePasswordForm;

// @codeCoverageIgnoreStart
final class UpdatePasswordComponent extends Component
{
    use HasMobileDesktopViews;

    public bool $showPassword = false;

    public UpdatePasswordForm $form;

    public function updatedFormCurrentPassword(): void
    {
        $this->validateOnly('form.current_password');
    }

    #[Computed]
    public function isValid(): bool
    {
        return $this->isMobile() || ! $this->getErrorBag()->any()
            && $this->form->current_password !== ''
            && $this->form->password !== ''
            && $this->form->password !== $this->current_password;
    }

    public function submit(): void
    {
        try {
            // Validate and attempt the update (may throw TMR or ValidationException)
            $this->form->updatePassword();

            Toaster::success('Password updated.');
            $this->dispatch('saved');

        } catch (TooManyRequestsException $e) {
            // Throttled: set the countdown on the form
            $this->form->secondsUntilReset = $e->secondsUntilAvailable;

            // Optionally show a toast or an inline error
            Toaster::error("Too many attempts. Try again in {$e->minutesUntilAvailable} minutes.");

            // clear just the password fields so user can try later
            $this->form->reset('current_password', 'password');

        } catch (ValidationException $e) {
            // Wrong current_password or other field errors
            Toaster::error('Please correct the errors and try again.');
            throw $e; // re-throw so Livewire shows the field errors
        }
    }

    public function render(): View
    {
        return view('settings::livewire.components.account.update-password');
    }
}
// @codeCoverageIgnoreEnd
