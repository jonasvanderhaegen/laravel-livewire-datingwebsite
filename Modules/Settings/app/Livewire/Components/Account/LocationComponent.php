<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Components\Account;

use Illuminate\View\View;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

final class LocationComponent extends Component
{
    public function GeolocationPosition(array $location): void
    {
        cache()->forget('settings:account:location:'.auth()->id());
        $profile = auth()->user()->profile;
        $profile->update([
            'js_location' => true,
            'lat' => $location['latitude'],
            'lng' => $location['longitude']],
        );

        /*
        if (! auth()->user()->hasCompletedOnboarding()) {
            if (! auth()->user()->hasOnboardingStep('location')) {
                auth()->user()->markOnboardingStep('location');
            }

            $this->redirectRoute('onboard.step2');
            Toaster::success('Location saved, next step');

        }
        */

        $this->dispatch('saved');

    }

    public function GeolocationPositionError($error): void
    {
        Toaster::error($error);
        $profile = auth()->user()->profile;
        $profile->update(['js_location' => false]);
    }

    public function dispatchToScript(): void
    {
        // TODO: Ratelimit this too
        $this->dispatch('requestLocation');
    }

    public function submitLocation(): void {}

    public function render(): View
    {
        $locationEnabled = cache()->rememberForever('settings:account:location:'.auth()->id(), fn () => auth()->user()->profile->js_location);

        if (! auth()->user()->hasCompletedOnboarding()) {
            $this->dispatch('locationEnabled', $locationEnabled);
        }

        return view('settings::livewire.components.account.location', compact('locationEnabled'));
    }
}
