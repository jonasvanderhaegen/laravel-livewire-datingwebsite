<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Components\Account;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Livewire\Component;
use Masmerise\Toaster\Toaster;
use Modules\Settings\Livewire\Forms\Account\PasskeysForm;
use Modules\WebAuthn\Concerns\HandlesPasskeys;
use Spatie\LaravelPasskeys\Actions\StorePasskeyAction;
use Spatie\LaravelPasskeys\Models\Passkey;
use Spatie\LaravelPasskeys\Support\Config;
use Webauthn\Exception\InvalidDataException;

// @codeCoverageIgnoreStart
final class PassKeysComponent extends Component
{
    use HandlesPasskeys;

    public PasskeysForm $form;

    public User $user;

    public function mount(): void
    {
        $this->user = auth()->user();
    }

    public function submit(): void
    {
        $this->form->validate();

        if (Gate::forUser($this->user)->denies('create', Passkey::class)) {
            Toaster::error('You can only register up to 6 passkeys.');

            return;
        }

        $this->dispatch('passkeyPropertiesValidated', [
            'passkeyOptions' => json_decode((string) $this->generatePasskeyOptions()),
        ]);
    }

    public function storePasskey(string $passkey): void
    {
        $storePasskeyAction = Config::getAction('store_passkey', StorePasskeyAction::class);
        try {
            $storePasskeyAction->execute(
                auth()->user(),
                $passkey,
                $this->previouslyGeneratedPasskeyOptions(),
                request()->getHost(),
                ['name' => $this->form->name]
            );

            Toaster::success(__('Your passkey has been added'));
            cache()->forget('settings:account:passkeys_list:'.auth()->id());
            $this->dispatch('saved');
            $this->form->reset();

        } catch (InvalidDataException $e) {
            Toaster::error($e->getMessage());
        }
    }

    public function deletePasskey(Passkey $passkey): void
    {
        if (Gate::forUser($this->user)->denies('delete', $passkey)) {
            Toaster::error('You can not delete this passkey.');

            return;
        }

        $passkey->delete();
        cache()->forget('settings:account:passkeys_list:'.auth()->id());
        Toaster::success(__('One of your passkey has been deleted.'));
    }

    public function render(): View
    {

        $passkeys = cache()->remember(
            'settings:account:passkeys_list:'.auth()->id(),
            now()->addMinutes(60),
            fn () => auth()->user()->passkeys()
                ->select(['id', 'authenticatable_id', 'name', 'created_at'])
                ->get()
        );

        return view('settings::livewire.components.account.pass-keys', ['passkeys' => $passkeys]);
    }
}
// @codeCoverageIgnoreEnd
