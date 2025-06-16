<?php

declare(strict_types=1);

namespace Modules\WebAuthn\Livewire\Pages;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Url;
use Masmerise\Toaster\Toaster;
use Modules\Core\Concerns\HasMobileDesktopViews;
use Modules\Core\Exceptions\TooManyRequestsException;
use Modules\CustomTheme\Livewire\Layouts\General;
use Modules\Shard\Actions\ResolveUserShard;
use Modules\Shard\Services\ShardResolver;
use Modules\WebAuthn\Concerns\HandlesPasskeys;
use Modules\WebAuthn\Livewire\Forms\ResetPasskeyForm;
use Spatie\LaravelPasskeys\Actions\StorePasskeyAction;
use Spatie\LaravelPasskeys\Support\Config;
use Throwable;

final class ResetPasskey extends General
{
    use HasMobileDesktopViews, HandlesPasskeys;

    public string $activeTab = 'ios';

    public ResetPasskeyForm $form;

    #[Url]
    #[Locked]
    public string $token = '';

    #[Url]
    #[Locked]
    public string $email = '';

    protected User $user;

    public function mount(ResolveUserShard $resolve): void
    {
        if (empty($this->token) || empty($this->email)) {
            Toaster::error(__('There was no token and/or e-mail provided'));
            $this->redirectIntended(
                default: route('passkey.request', absolute: false),
                navigate: true
            );

            return;
        }

        // 1) Figure out which shard this email lives in
        $map = $resolve->byEmail($this->email);
        if (! $map) {
            Toaster::error(__('The passkey reset link is invalid or has expired.'));
            $this->redirectRoute('passkey.request', navigate: true);

            return;
        }

        // 2) Set the shard for all subsequent queries
        ShardResolver::setShard($map['shard_id']);

        // 3) Load the user from that shard
        $this->user = User::on($map['shard_id'])
            ->where('email', $this->email)
            ->firstOrFail();

        // 4) Prefill form
        $this->form->token = $this->token;
        $this->form->email = $this->email;

        // 5) Init throttling
        $this->form->initRateLimitCountdown('validateAndThrottle', null, 'reset-passkey');
    }

    public function render(): View
    {
        return view("webauthn::livewire.pages.{$this->addTo('reset')}")
            ->title('Reset Passkey');
    }

    public function submit(ResolveUserShard $resolve): void
    {
        try {
            $this->form->validateAndThrottle();

            // Re‐resolve shard + user (in case mount wasn’t invoked)
            $map = $resolve->byEmail($this->form->email);
            ShardResolver::setShard($map['shard_id']);
            $this->user = User::on($map['shard_id'])
                ->where('email', $this->form->email)
                ->firstOrFail();

            $broker = Password::broker('passkeys');

            if (! $broker->tokenExists($this->user, $this->form->token)) {
                Toaster::error(__('The passkey reset link is invalid or has expired.'));
                $this->redirectRoute('passkey.request', navigate: true);

                return;
            }

            // Kick off the client‐side passkey ceremony
            $this->dispatch('passkeyPropertiesValidated', [
                'passkeyOptions' => json_decode((string) $this->generatePasskeyOptions()),
            ]);
        } catch (TooManyRequestsException $e) {
            $this->form->secondsUntilReset = $e->secondsUntilAvailable;
            Toaster::error(__('Too many attempts, wait :minutes minutes', [
                'minutes' => $e->minutesUntilAvailable,
            ]));
        } catch (ValidationException $e) {
            Toaster::error($e->getMessage());
        }
    }

    public function storePasskey(
        string $passkey,
        ResolveUserShard $resolve,
        StorePasskeyAction $storePasskey
    ): void {
        // Ensure we’re on the right shard once more
        $map = $resolve->byEmail($this->form->email);
        ShardResolver::setShard($map['shard_id']);

        try {
            // 1) Store the new passkey
            $storePasskey->execute(
                $this->user,
                $passkey,
                $this->previouslyGeneratedPasskeyOptions(),
                request()->getHost(),
                ['name' => 'Reset passkey']
            );

            // 2) Remove any older “Reset passkey” entries
            $this->user->passkeys()
                ->where('name', 'Reset passkey')
                ->orderByDesc('created_at')
                ->skip(1)
                ->take(PHP_INT_MAX)
                ->delete();

            // 3) Clear any passkey‐list cache
            cache()->forget('settings:account:passkeys_list:'.$this->user->getKey());

            // 4) Login + session shard
            session(['user_shard' => $map['shard_id']]);
            auth()->loginUsingId($this->user->getAuthIdentifier());

            // 5) Success
            Toaster::success(__('Your passkey has been reset and you\'re logged in.'));
            $this->redirectRoute('protected.discover', navigate: true);
        } catch (Throwable $e) {
            Toaster::error(__('Something went wrong resetting your passkey.'));
            report($e);
        }
    }

    public function isFormValid(): bool
    {
        // you can add real validation here if needed
        return true;
    }
}
