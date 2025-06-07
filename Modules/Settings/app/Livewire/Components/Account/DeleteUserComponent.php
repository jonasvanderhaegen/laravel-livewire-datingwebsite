<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Components\Account;

use App\Contracts\DeletesUsers;
use Illuminate\View\View;
use Livewire\Component;
use Masmerise\Toaster\Toaster;
use Modules\Settings\Livewire\Forms\Account\DeleteUserForm;

final class DeleteUserComponent extends Component
{
    public DeleteUserForm $form;

    public bool $showPassword = false;

    /**
     * Indicates if user deletion is being confirmed.
     *
     * @var bool
     */
    public $confirmingUserDeletion = false;

    public function toggleShowPassword(): void
    {
        $this->showPassword = !$this->showPassword;
    }

    public function mount(): void
    {
        $this->form->email = auth()->user()->email;
    }

    /**
     * Confirm that the user would like to delete their account.
     *
     * @return void
     */
    public function confirmUserDeletion(): void
    {
        $this->resetErrorBag();

        $this->password = '';

        $this->dispatch('confirming-delete-user');

        $this->confirmingUserDeletion = true;
    }

    public function submit(): void
    {
        ray($this->form->all());
        $this->resetErrorBag();

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
