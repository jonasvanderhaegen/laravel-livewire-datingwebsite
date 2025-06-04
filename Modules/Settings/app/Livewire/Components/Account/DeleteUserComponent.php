<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Components\Account;

use App\Contracts\DeletesUsers;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
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
        $this->showPassword = ! $this->showPassword;
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
    public function confirmUserDeletion()
    {
        $this->resetErrorBag();

        $this->password = '';

        $this->dispatch('confirming-delete-user');

        $this->confirmingUserDeletion = true;
    }

    public function submit(Request $request, DeletesUsers $deleter, StatefulGuard $auth): Redirector|RedirectResponse
    {
        ray($this->form->all());
        $this->resetErrorBag();
        $deleter->delete(Auth::user()->fresh());

        $auth->logout();

        if ($request->hasSession()) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        Toaster::success('Sad to see you go, glad you found your match');

        $this->redirectIntended(
            default: route('home', absolute: false),
            navigate: false
        );
    }

    /**
     * Delete the current user.
     *
     * @return Redirector|RedirectResponse
     */

    // public function deleteUser(Request $request, DeletesUsers $deleter, StatefulGuard $auth)
    // {
    //     $this->resetErrorBag();

    //     if (! Hash::check($this->form->password, Auth::user()->password)) {
    //         throw ValidationException::withMessages([
    //             'form.password' => [__('This password does not match our records.')],
    //         ]);
    //     }

    //     $deleter->delete(Auth::user()->fresh());

    //     $auth->logout();

    //     if ($request->hasSession()) {
    //         $request->session()->invalidate();
    //         $request->session()->regenerateToken();
    //     }

    //     Toaster::success('Sad to see you go, glad you found your match');

    //     $this->redirectIntended(
    //         default: route('protected.discover', absolute: false),
    //         navigate: false
    //     );
    // }

    public function render(): View
    {
        return view('settings::livewire.components.account.delete-user-form');
    }
}
