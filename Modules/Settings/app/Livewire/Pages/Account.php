<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Pages;

use Illuminate\View\View;
use Modules\CustomTheme\Livewire\Layouts\General;
use Nwidart\Modules\Facades\Module;

final class Account extends General
{
    public function render(): View
    {
        $passkeys = Module::findOrFail('WebAuthn')->isEnabled();
        $passwords = Module::findOrFail('ClassicAuth')->isEnabled();

        return view('settings::livewire.account', compact('passwords', 'passkeys'))
            ->title('Settings: Account');
    }
}
