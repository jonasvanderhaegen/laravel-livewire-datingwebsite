<?php

declare(strict_types=1);

namespace Modules\ClassicAuth\Livewire;

use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Masmerise\Toaster\Toaster;
use Modules\ClassicAuth\Livewire\Forms\ForgotPasswordForm;
use Modules\Core\Concerns\HasMobileDesktopViews;
use Modules\Core\Exceptions\TooManyRequestsException;
use Modules\CustomTheme\Livewire\Layouts\General;

// @codeCoverageIgnoreStart
final class Forgot extends General
{
    use HasMobileDesktopViews;

    public ForgotPasswordForm $form;

    public function mount(): void
    {
        $this->form->initRateLimitCountdown('sendResetUrl', null, 'forgotPassword');
    }

    public function submit(): void
    {
        try {
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

    public function updated(string $field): void
    {
        $this->validateOnly($field);
    }

    #[Computed]
    public function isFormValid(): bool
    {
        return $this->isMobile() || ! $this->getErrorBag()->any()
            && $this->form->email !== '';
    }

    public function render(): View
    {
        return view("classicauth::livewire.{$this->addTo('forgot')}", ['intent' => 'password'])
            ->title(__('Send request for password reset'));
    }
}
// @codeCoverageIgnoreEnd
