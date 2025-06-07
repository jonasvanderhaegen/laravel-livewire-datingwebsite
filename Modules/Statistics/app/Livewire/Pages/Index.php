<?php

declare(strict_types=1);

namespace Modules\Statistics\Livewire\Pages;

use Illuminate\View\View;
use Modules\CustomTheme\Livewire\Layouts\General;

final class Index extends General
{
    public function render(): View
    {
        return view('statistics::livewire.pages.index');
    }
}
