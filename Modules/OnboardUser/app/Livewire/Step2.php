<?php

declare(strict_types=1);

namespace Modules\OnboardUser\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Masmerise\Toaster\Toaster;
use Modules\CustomTheme\Livewire\Layouts\General;

// @codeCoverageIgnoreStart
final class Step2 extends General
{
    public bool $genders = false;

    public bool $orientations = false;

    public bool $orientations_notsay = false;

    public bool $pronouns_notsay = false;

    public bool $pronouns = false;

    public bool $relationshipType = false;

    /**
     * @var array<string,string> Livewire event → handler mappings
     */
    protected $listeners = [
        'sendMountedData' => 'handleMountedData',
        'profileChanged' => 'updateProperty',
    ];

    public function goNextStep(): void
    {
        if (! $this->nextStepAvailable()) {
            Toaster::warning('Please fill out all required fields');
        }

        if (! auth()->user()->hasOnboardingStep('profile')) {
            auth()->user()->markOnboardingStep('profile');
        }

        Toaster::success('Profile saved, on to next and last step');
        $this->redirectRoute('protected.discover');
    }

    #[Computed]
    public function nextStepAvailable(): bool
    {
        return $this->pronounsValid() && $this->orientationValid() && $this->relationshipType && $this->genders;
    }

    #[Computed]
    public function pronounsValid(): bool
    {
        if ($this->pronouns_notsay === true) {
            return true;
        }

        return $this->pronouns;
    }

    #[Computed]
    public function orientationValid(): bool
    {
        if ($this->orientations_notsay === true) {
            return true;
        }

        return $this->orientations;
    }

    public function render(): View
    {
        return view('onboarduser::livewire.step2');
    }

    public function updateProperty(string $prop, mixed $value): void
    {
        if (property_exists($this, $prop)) {
            $this->$prop = (bool) $value;
        }
    }

    /**
     * @param  array{genders:bool,orientations:bool,orientations_notsay:bool,pronouns_notsay:bool,pronouns:bool,relationshipType:bool}  $data
     */
    public function handleMountedData(array $data): void
    {
        $this->genders = $data['genders'];
        $this->orientations = $data['orientations'];
        $this->orientations_notsay = $data['orientations_notsay'];
        $this->pronouns_notsay = $data['pronouns_notsay'];
        $this->pronouns = $data['pronouns'];
        $this->relationshipType = $data['relationshipType'];
    }
}
// @codeCoverageIgnoreEnd
