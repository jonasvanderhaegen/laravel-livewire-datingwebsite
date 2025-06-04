<?php

declare(strict_types=1);

namespace Modules\OnboardUser\Livewire;

use Modules\CustomTheme\Livewire\Layouts\General;

final class Step3 extends General
{
    public function render()
    {
        return view('onboarduser::livewire.step3');
    }
}
