<?php

declare(strict_types=1);

namespace Modules\Statistics\Livewire\Pages;

use Modules\CustomTheme\Livewire\Layouts\General;

final class Index extends General
{
    public function render()
    {
        return view('statistics::livewire.pages.index');
    }
}
