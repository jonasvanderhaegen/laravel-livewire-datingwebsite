<?php

declare(strict_types=1);

namespace Modules\WebAuthn\Livewire\Pages;

use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Masmerise\Toaster\Toaster;
use Modules\Core\Exceptions\TooManyRequestsException;
use Modules\CustomTheme\Livewire\Layouts\General;
use Modules\WebAuthn\Livewire\Forms\ForgotPasskeyForm;

final class LostPasskey extends General
{
    public ForgotPasskeyForm $form;

    public function mount(): void
    {
        $this->form->initRateLimitCountdown('sendResetUrl', null, 'forgotPasskey');
    }

    public function submit(): void
    {
        try {
            $this->form->initRateLimitCountdown('sendResetUrl', null, 'forgotPasskey');
            $this->form->sendResetUrl();

            Session::flash('status', 'password-request-sent');
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
