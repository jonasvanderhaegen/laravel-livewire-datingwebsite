<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Pages;

use Illuminate\View\View;
use Modules\CustomTheme\Livewire\Layouts\General;

final class Images extends General
{
    public function render(): View
    {
        // TODO: Add images with paginate, let user edit per page
        return view('settings::livewire.images');
    }
}
