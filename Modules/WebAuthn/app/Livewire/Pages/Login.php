<?php

declare(strict_types=1);

namespace Modules\WebAuthn\Livewire\Pages;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;
use Masmerise\Toaster\Toaster;
use Modules\Core\Concerns\HasMobileDesktopViews;
use Modules\Core\Exceptions\TooManyRequestsException;
use Modules\CustomTheme\Livewire\Layouts\General;
use Modules\Profile\Models\Profile;
use Modules\Shard\Actions\ResolveUserShard;
use Modules\Shard\Services\ShardResolver;
use Modules\WebAuthn\Livewire\Forms\LoginForm;
use Spatie\LaravelPasskeys\Actions\FindPasskeyToAuthenticateAction;
use Spatie\LaravelPasskeys\Actions\GeneratePasskeyAuthenticationOptionsAction;
use Spatie\LaravelPasskeys\Support\Config;

/**
 * @codeCoverageIgnore
 */
final class Login extends General
{
    use HasMobileDesktopViews;

    public string $activeTab = 'ios';

    public LoginForm $form;

    public function mount(): void
    {
        // initialize rate‐limiting on the login form
        $this->form->initRateLimitCountdown('rateLimitForm', null, 'login');
    }

    /**
     * Step 1: generate WebAuthn assertion options and fire to the frontend.
     */
    public function submit(): void
    {
        try {
            $action = Config::getAction(
                'generate_passkey_authentication_options',
                GeneratePasskeyAuthenticationOptionsAction::class
            );
            $optionsJSON = $action->execute();

            session(['passkey_auth_options' => $optionsJSON]);

            $this->dispatch('passkeyProperties', ['optionsJSON' => $optionsJSON]);
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
        }
    }

    /**
     * Step 2: handle the client's WebAuthn response.
     */
    public function authenticatedWithPasskey(
        string $credentialJson,
        ResolveUserShard $resolveUserShard,
        FindPasskeyToAuthenticateAction $findPasskey
    ): void {
        $optionsJSON = session()->pull('passkey_auth_options');

        $passkey = $findPasskey->execute(
            $credentialJson,
            $optionsJSON
        );

        if (empty($passkey['authenticatable_id'] ?? null)) {
            $this->invalidPasskeyResponse();

            return;
        }

        $this->logInByUlid(
            $passkey['authenticatable_id'],
            $resolveUserShard
        );

        Toaster::success(__('auth.authenticated'));
        $this->redirectRoute('protected.discover');
    }

    public function render(): View
    {
        return view("webauthn::livewire.pages.{$this->addTo('login')}")
            ->title('Login');
    }

    /**
     * Load the user by ULID, set shard, store session, and log in.
     */
    protected function logInByUlid(string $ulid, ResolveUserShard $resolveUserShard): void
    {
        // 1) find which shard holds this ULID
        $shard = $resolveUserShard->byUlid($ulid);
        if (! $shard) {
            abort(403, 'Invalid credentials.');
        }

        // 2) set the current shard for all subsequent queries
        ShardResolver::setShard($shard);

        // 3) load the user (ULID is primary key now)
        /** @var User $user */
        $user = User::on($shard)->findOrFail($ulid);

        // 4) store just the shard & profile ID in session
        Session::put([
            'user_shard' => $shard,
            'profile_id' => $user->profile->getKey(),
        ]);

        // 5) log them in by ULID (primary key)
        auth()->loginUsingId($ulid, true);

        // 6) rotate session ID for security
        session()->regenerate();
    }

    protected function invalidPasskeyResponse(): void
    {
        session()->flash('authenticatePasskey::message', __('passkeys::passkeys.invalid'));
        Toaster::error(__('passkeys::passkeys.invalid'));
    }
}
