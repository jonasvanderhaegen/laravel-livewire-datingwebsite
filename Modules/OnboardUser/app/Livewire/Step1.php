<?php

declare(strict_types=1);

namespace Modules\OnboardUser\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Masmerise\Toaster\Toaster;
use Modules\CustomTheme\Livewire\Layouts\General;

final class Step1 extends General
{

    /**
     * @var array<string,string>  Livewire event → handler mappings
     */
    public $listeners = [
        'locationEnabled' => 'handleMountedData',
    ];

    public bool $locationEnabled = false;

    #[Computed]
    public function nextStepAvailable(): bool
    {
        return $this->locationEnabled;
    }

    public function goNextStep(): void
    {
        if (!auth()->user()->hasOnboardingStep('location')) {
            auth()->user()->markOnboardingStep('location');
            Toaster::success('Location saved, on to next and last step');
        }

        $this->redirectRoute('onboard.step2');
    }

    public function handleMountedData(bool $locationEnabled): void
    {
        $this->locationEnabled = $locationEnabled;
    }

    public function render(): View
    {
        return view('onboarduser::livewire.step1');
    }
}
