<?php

declare(strict_types=1);

namespace Modules\WebAuthn\Livewire\Pages;

use Illuminate\View\View;
use Modules\CustomTheme\Livewire\Layouts\General;

final class Instructions extends General
{
    public function render(): View
    {
        return view('webauthn::livewire.pages.instructions');
    }
}
