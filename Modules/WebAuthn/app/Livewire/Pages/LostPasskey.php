<?php

declare(strict_types=1);

namespace Modules\WebAuthn\Livewire\Pages;

use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Masmerise\Toaster\Toaster;
use Modules\Core\Exceptions\TooManyRequestsException;
use Modules\CustomTheme\Livewire\Layouts\General;
use Modules\WebAuthn\Livewire\Forms\LostPasskeyForm;

// @codeCoverageIgnoreStart
final class LostPasskey extends General
{
    public LostPasskeyForm $form;

    public string $activeTab = 'ios';

    #[Computed]
    public function isFormValid(): bool
    {
        return ! $this->getErrorBag()->any()
            && $this->form->email !== '';
    }

    public function mount(): void
    {
        $this->form->initRateLimitCountdown('validateAndThrottle', LostPasskeyForm::class, 'lost-passkey');
    }

    public function submit(): void
    {
        try {
            $this->form->initRateLimitCountdown('validateAndThrottle', LostPasskeyForm::class, 'lost-passkey');

            $this->form->validateAndThrottle();

            $this->form->sendResetLink();

            session()->flash('status', 'password-request-sent');
            Toaster::success(__('A link will be sent if the account exists.'));

        } catch (TooManyRequestsException $e) {

            $this->form->secondsUntilReset = $e->secondsUntilAvailable;

            Toaster::error(__('Too many attempts, wait for :minutes minutes',
                ['minutes' => $e->minutesUntilAvailable]));
        } catch (ThrottleRequestsException $e) {
            Toaster::error($e->getMessage());
        }
    }

    public function updatedFormEmail(): void
    {
        $this->validateOnly('form.email');
    }

    public function render(): View
    {
        return view('auth::livewire.forgot', ['intent' => 'passkey'])
            ->title('Forgot or lost passkey');
    }
}
// @codeCoverageIgnoreEnd
