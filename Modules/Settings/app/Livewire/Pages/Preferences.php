<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Pages;

use Illuminate\View\View;
use Modules\CustomTheme\Livewire\Layouts\General;

final class Preferences extends General
{
    public function render(): View
    {
        return view('settings::livewire.preferences');
    }
}
