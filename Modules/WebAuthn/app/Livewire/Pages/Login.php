<?php

declare(strict_types=1);

namespace Modules\WebAuthn\Livewire\Pages;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\View\View;
use Masmerise\Toaster\Toaster;
use Modules\Core\Exceptions\TooManyRequestsException;
use Modules\CustomTheme\Livewire\Layouts\General;
use Modules\WebAuthn\Livewire\Forms\LoginForm;
use Spatie\LaravelPasskeys\Actions\FindPasskeyToAuthenticateAction;
use Spatie\LaravelPasskeys\Actions\GeneratePasskeyAuthenticationOptionsAction;
use Spatie\LaravelPasskeys\Support\Config;

// @codeCoverageIgnoreStart
final class Login extends General
{
    public string $activeTab = 'ios';

    public LoginForm $form;

    public function mount(): void
    {
        $this->form->initRateLimitCountdown('rateLimitForm', null, 'login');
    }

    public function submit(): void
    {
        try {
            $this->form->initRateLimitCountdown('rateLimitForm', null, 'login');
            $this->form->rateLimitForm();

            $action = Config::getAction('generate_passkey_authentication_options',
                GeneratePasskeyAuthenticationOptionsAction::class);

            $optionsJSON = $action->execute();
            session()->put('passkey-auth-options', $optionsJSON);

            $this->dispatch('passkeyProperties', compact(['optionsJSON']));

        } catch (TooManyRequestsException $e) {
            Toaster::error($e->getMessage());
            $this->form->secondsUntilReset = $e->secondsUntilAvailable;

            $this->addError('form.email', __('auth.throttle', [
                'seconds' => $e->secondsUntilAvailable,
                'minutes' => ceil($e->minutesUntilAvailable),
            ]));
        }
    }

    public function authenticatedWithPasskey(string $answer): void
    {
        $findAuthenticatableUsingPasskey = Config::getAction(
            'find_passkey',
            FindPasskeyToAuthenticateAction::class
        );

        $passkey = $findAuthenticatableUsingPasskey->execute(
            $answer,
            session()->pull('passkey-auth-options'),
        );

        if (! $passkey) {
            $this->invalidPasskeyResponse();

            return;
        }

        /** @var Authenticatable|null $authenticatable */
        $authenticatable = $passkey->authenticatable;

        if (! $authenticatable) {
            $this->invalidPasskeyResponse();

            return;
        }

        $this->logInAuthenticatable($authenticatable);

        Toaster::success(__('auth.authenticated'));

        $this->redirectRoute('protected.discover');
    }

    public function render(): View
    {
        return view('webauthn::livewire.pages.login')
            ->title('Login');
    }

    protected function logInAuthenticatable(Authenticatable $authenticatable): self
    {
        auth()->login($authenticatable);

        session()->regenerate();

        return $this;
    }

    protected function invalidPasskeyResponse(): void
    {
        session()->flash('authenticatePasskey::message', __('passkeys::passkeys.invalid'));
        Toaster::error(__('passkeys::passkeys.invalid'));

    }
}
// @codeCoverageIgnoreEnd
