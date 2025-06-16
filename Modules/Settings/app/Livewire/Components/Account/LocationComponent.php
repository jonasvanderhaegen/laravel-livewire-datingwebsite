<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Components\Account;

use Illuminate\View\View;
use Livewire\Component;
use Masmerise\Toaster\Toaster;
use Modules\Profile\Models\Profile;

final class LocationComponent extends Component
{
    public int $profileId;

    public bool $jsLocation = false;

    public ?float $lat = null;

    public ?float $lng = null;

    /**
     * Fetch once on mount and hydrate simple public props.
     */
    public function mount(): void
    {
        $shard = session('user_shard');

        $profile = cache()->remember('settings:account:locationcomp:'.auth()->id(),
            30,
            fn () => Profile::on($shard)
            ->findOrFail(
                session('profile_id')
                ?? Profile::on($shard)->firstWhere('user_id', auth()->id())->id,
                ['id', 'lat', 'lng', 'js_location']
            ));

        $this->profileId = $profile->id;
        $this->jsLocation = (bool) $profile->js_location;
        $this->lat = $profile->lat;
        $this->lng = $profile->lng;
    }

    /**
     * Update the stored model *and* our public props,
     * so the UI can re-render without an extra query.
     */
    public function GeolocationPosition(array $location): void
    {
        $shard = session('user_shard');

        Profile::on($shard)->whereKey($this->profileId)->update([
            'js_location' => true,
            'lat' => $location['latitude'],
            'lng' => $location['longitude'],
        ]);

        cache()->forget('settings:account:locationcomp:'.auth()->id());

        $this->jsLocation = true;
        $this->lat = $location['latitude'];
        $this->lng = $location['longitude'];

        $this->dispatch('saved');
    }

    public function GeolocationPositionError(string $error): void
    {
        Toaster::error($error);

        $shard = session('user_shard');

        Profile::on($shard)
            ->whereKey($this->profileId)
            ->update(['js_location' => false]);

        cache()->forget('settings:account:locationcomp:'.auth()->id());

        $this->jsLocation = false;

        $this->dispatch('saved');
    }

    public function dispatchToScript(): void
    {
        $this->dispatch('requestLocation');
    }

    public function render(): View
    {
        return view('settings::livewire.components.account.location', [
            'locationEnabled' => $this->jsLocation,
        ]);
    }
}
