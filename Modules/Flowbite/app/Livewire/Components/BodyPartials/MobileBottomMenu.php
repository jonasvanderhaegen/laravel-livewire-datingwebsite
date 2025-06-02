<?php

declare(strict_types=1);

namespace Modules\Flowbite\Livewire\Components\BodyPartials;

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

        return view('flowbite::livewire.components.body-partials.mobile-bottom-menu', compact('tabs'));
    }
}
