<?php

declare(strict_types=1);

namespace Modules\Page\Livewire\Pages;

use Illuminate\View\View;
use Modules\CustomTheme\Livewire\Layouts\General;

final class Safety extends General
{
    public function render(): View
    {
        return view('page::livewire.pages.safety');
    }
}
