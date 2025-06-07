<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Components\Account;

use Illuminate\View\View;
use Livewire\Component;
use Masmerise\Toaster\Toaster;
use Modules\Profile\Models\Profile;

// @codeCoverageIgnoreStart
final class LocationComponent extends Component
{
    public Profile $profile;

    public function mount(): void
    {
        $this->profile = auth()->user()->profile;
    }

    /**
     * Handle a successful geolocation lookup.
     *
     * @param  array{latitude: float, longitude: float}  $location
     */
    public function GeolocationPosition(array $location): void
    {
        cache()->forget('settings:account:location:'.auth()->id());

        $this->profile->update([
            'js_location' => true,
            'lat' => $location['latitude'],
            'lng' => $location['longitude'],
        ]);

        // Uncomment and adjust if onboarding logic is needed:
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

    /**
     * Handle a geolocation error.
     */
    public function GeolocationPositionError(string $error): void
    {
        Toaster::error($error);

        $this->profile->update(['js_location' => false]);
    }

    public function dispatchToScript(): void
    {
        // TODO: Ratelimit this too
        $this->dispatch('requestLocation');
    }

    public function submitLocation(): void
    {
        // Intentionally empty (if no server‐side submission beyond JS event)
    }

    public function render(): View
    {
        /** @var bool $locationEnabled */
        $locationEnabled = cache()->rememberForever(
            'settings:account:location:'.auth()->id(),
            fn (): bool => (bool) $this->profile->js_location
        );

        if (! auth()->user()->hasCompletedOnboarding()) {
            $this->dispatch('locationEnabled', $locationEnabled);
        }

        return view(
            'settings::livewire.components.account.location',
            compact('locationEnabled')
        );
    }
}
// @codeCoverageIgnoreEnd
