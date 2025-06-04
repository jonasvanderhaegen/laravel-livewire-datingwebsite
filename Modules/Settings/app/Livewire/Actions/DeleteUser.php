<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Actions;

use Illuminate\Support\Facades\Auth;

final class DeleteUser
{
    public function __invoke()
    {
        Auth::user()->delete();
        Auth::guard('web')->logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect('/')
            ->success('toasts.delete-user');
    }
}
