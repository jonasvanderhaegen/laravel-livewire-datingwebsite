<?php

declare(strict_types=1);

namespace Modules\Page\Livewire\Pages;

use Illuminate\View\View;
use Modules\Core\Concerns\HasMobileDesktopViews;
use Modules\CustomTheme\Livewire\Layouts\General;

final class Home extends General
{
    use HasMobileDesktopViews;

    public function render(): View
    {
        return view("page::livewire.pages.{$this->addTo('home')}")
            ->title(__('Home'));
    }
}
