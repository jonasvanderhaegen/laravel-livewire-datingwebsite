<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Components\Account;

use Illuminate\View\View;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

// @codeCoverageIgnoreStart
final class DeleteUserComponent extends Component
{
    /**
     * Indicates if user deletion is being confirmed.
     */
    public bool $confirmingUserDeletion = false;

    public function mount(): void {}

    public function confirmUserDeletion(): void
    {
        $this->resetErrorBag();

        $this->dispatch('confirming-delete-user');

        $this->confirmingUserDeletion = true;
    }

    public function submit(): void
    {

        Toaster::success('Sad to see you go, glad you found your match');

        $this->redirectIntended(
            default: route('home', absolute: false),
            navigate: false
        );
    }

    public function render(): View
    {
        return view('settings::livewire.components.account.delete-user-form');
    }
}
// @codeCoverageIgnoreEnd
