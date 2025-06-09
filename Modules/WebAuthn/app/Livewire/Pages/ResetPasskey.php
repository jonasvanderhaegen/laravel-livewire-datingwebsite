<?php

declare(strict_types=1);

namespace Modules\WebAuthn\Livewire\Pages;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Url;
use Masmerise\Toaster\Toaster;
use Modules\Core\Exceptions\TooManyRequestsException;
use Modules\CustomTheme\Livewire\Layouts\General;
use Modules\WebAuthn\Concerns\HandlesPasskeys;
use Modules\WebAuthn\Livewire\Forms\ResetPasskeyForm;
use Spatie\LaravelPasskeys\Actions\StorePasskeyAction;
use Spatie\LaravelPasskeys\Support\Config;
use Throwable;
use Webauthn\Exception\InvalidDataException;

// @codeCoverageIgnoreStart
final class ResetPasskey extends General
{
    use HandlesPasskeys;

    public string $activeTab = 'ios';

    public ResetPasskeyForm $form;

    #[Url]
    #[Locked]
    public string $token = '';

    #[Url]
    #[Locked]
    public string $email = '';

    protected User $user;

    public function mount(): void
    {
        if (empty($this->token) || empty($this->email)) {
            Toaster::error(__('There was no token and/or e-mail provided'));
            $this->redirectIntended(
                default: route('passkey.request', absolute: false),
                navigate: true
            );
        }

        try {
            $this->user = User::whereEmail($this->email)->firstOrFail();
            $this->form->token = $this->token;
            $this->form->email = $this->email;

        } catch (ModelNotFoundException $e) {
            Toaster::error($e->getMessage());
            $this->redirectIntended(
                default: route('passkey.request', absolute: false),
                navigate: true
            );
        }

    }

    public function render(): View
    {
        return view('webauthn::livewire.pages.reset-passkey')
            ->title('Reset Passkey');
    }

    public function storePasskey(string $passkey): void
    {

        $storePasskeyAction = Config::getAction('store_passkey', StorePasskeyAction::class);
        $user = User::firstWhere('email', $this->form->email);

        try {
            $storePasskeyAction->execute(
                $user,
                $passkey, $this->previouslyGeneratedPasskeyOptions(),
                request()->getHost(),
                ['name' => 'Reset passkey']
            );

            $user
                ->passkeys()
                ->where('name', 'Reset passkey')
                ->orderByDesc('created_at')  // newest first
                ->skip(1)                    // skip the very newest
                ->take(PHP_INT_MAX)          // then delete everything else
                ->delete();

            cache()->forget('settings:account:passkeys_list:'.$user->id);

            auth()->login($user);
            Toaster::success(__('Your passkey has been reset and you\'re logged in.'));
            $this->redirectRoute('protected.discover', navigate: true);
        } catch (Throwable $e) {
            ray($e->getMessage());
        }

    }

    public function submit(): void
    {
        try {
            $this->form->rateLimitForm();

            $this->user = User::whereEmail($this->email)->firstOrFail();

            $broker = Password::broker('passkeys');

            if (! $broker->tokenExists($this->user, $this->token)) {
                Toaster::error(__('The passkey reset link is invalid or has expired.'));

                $this->redirectIntended(
                    default: route('passkey.request', absolute: false),
                    navigate: true
                );

                return;
            }

            $this->dispatch('passkeyPropertiesValidated', [
                'passkeyOptions' => json_decode((string) $this->generatePasskeyOptions()),
            ]);

        } catch (TooManyRequestsException $e) {
            $this->form->secondsUntilReset = $e->secondsUntilAvailable;
            Toaster::error(__('Too many attempts, wait for :minutes minutes',
                ['minutes' => $e->minutesUntilAvailable]));

        } catch (ValidationException $e) {
            if ($e->getMessage() === Password::INVALID_TOKEN) {
                Toaster::error(__($e->getMessage()));
                session()->flash('status', 'password-reset-token-invalid');

                $this->redirectRoute('password.request');
            } else {
                Toaster::error($e->getMessage());
            }

        } catch (InvalidDataException $e) {
            Toaster::error($e->getMessage());

        }
    }
}
// @codeCoverageIgnoreEnd
