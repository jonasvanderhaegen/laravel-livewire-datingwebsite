<?php

declare(strict_types=1);

namespace Modules\OnboardUser\Livewire;

use Illuminate\View\View;
use Modules\CustomTheme\Livewire\Layouts\General;

final class Step4 extends General
{
    public function render(): View
    {
        return view('onboarduser::livewire.step4');
    }
}
