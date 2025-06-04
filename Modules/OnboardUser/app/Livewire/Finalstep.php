<?php

declare(strict_types=1);

namespace Modules\OnboardUser\Livewire;

use Illuminate\View\View;
use Masmerise\Toaster\Toaster;
use Modules\CustomTheme\Livewire\Layouts\General;

final class Finalstep extends General
{
    public function goNextStep(): void
    {
        auth()->user()->markOnboardingStep('final');
        auth()->user()->finalizeOnboarding(['final']);
        Toaster::success('Onboarding complete');
        $this->redirectRoute('protected.discover');
    }

    public function render(): View
    {
        return view('onboarduser::livewire.finalstep');
    }
}
