<?php

declare(strict_types=1);

namespace Modules\CustomTheme\Livewire\Components\BodyPartials;

use Illuminate\View\View;
use Livewire\Component;

final class MobileBottomMenu extends Component
{
    public function render(): View
    {
        $tabs = [
            'general',
            'preferences',
        ];

        return view('customtheme::livewire.components.body-partials.mobile-bottom-menu', compact('tabs'));
    }
}
