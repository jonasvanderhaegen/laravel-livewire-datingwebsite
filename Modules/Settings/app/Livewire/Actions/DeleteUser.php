<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Actions;

use Illuminate\Http\RedirectResponse;

final class DeleteUser
{
    public function __invoke(): RedirectResponse
    {
        auth()->user()->delete();
        auth()->guard('web')->logout();
        session()->invalidate();
        session()->regenerateToken();

        return to_route('home');
    }
}
