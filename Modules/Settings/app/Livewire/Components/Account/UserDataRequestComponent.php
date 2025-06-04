<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Components\Account;

use Illuminate\View\View;
use Livewire\Component;

final class UserDataRequestComponent extends Component
{
    public function render(): View
    {
        return view('settings::livewire.components.account.user-data-request');
    }
}
