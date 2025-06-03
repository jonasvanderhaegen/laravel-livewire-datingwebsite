<?php

declare(strict_types=1);

namespace Modules\Auth\Livewire\Actions;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

final class Logout
{
    public function __invoke(): RedirectResponse|Redirector
    {
        Auth::guard('web')->logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect('/')
            ->success('toasts.logout');
    }
}
