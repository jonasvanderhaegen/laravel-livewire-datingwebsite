<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Components\Account;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Livewire\Component;
use Masmerise\Toaster\Toaster;
use Modules\Settings\Livewire\Forms\Account\PasskeysForm;
use Spatie\LaravelPasskeys\Models\Passkey;

// @codeCoverageIgnoreStart
final class PassKeysComponent extends Component
{
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
    }

    public function render(): View
    {
        return view('settings::livewire.components.account.pass-keys', ['passkeys' => collect([])]);
    }
}
// @codeCoverageIgnoreEnd
