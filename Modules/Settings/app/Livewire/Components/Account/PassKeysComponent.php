<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Components\Account;

use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Livewire\Component;
use Masmerise\Toaster\Toaster;
use Modules\Settings\Livewire\Forms\Account\PasskeysForm;
use Modules\WebAuthn\Traits\PasskeyHandles;
use Spatie\LaravelPasskeys\Models\Passkey;

final class PassKeysComponent extends Component
{
    use PasskeyHandles;

    public PasskeysForm $form;

    public function submit(): void
    {
        $this->form->validate();

        if (Gate::forUser($this->user)->denies('create', Passkey::class)) {
            Toaster::error('You can only register up to 6 passkeys.');

            return;
        }

        $user = auth()->user();

    }

    public function render(): View
    {
        return view('settings::livewire.components.account.pass-keys', ['passkeys' => collect([])]);
    }
}
