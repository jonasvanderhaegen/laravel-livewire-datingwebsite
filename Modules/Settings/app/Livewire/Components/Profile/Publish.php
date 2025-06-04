<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Components\Profile;

use Illuminate\View\View;
use Livewire\Component;
use Masmerise\Toaster\Toaster;
use Modules\Profile\Models\Profile;

final class Publish extends Component
{
    public $public = false;

    public Profile $profile;

    public function mount(): void
    {
        $this->profile = auth()->user()->profile;
        $this->public = $this->profile->public;
    }

    public function updatedPublic(bool $value): void
    {
        Toaster::success('Profile visibility updated to '.($value ? 'public' : 'private'));
        $this->profile->update(['public' => $value]);
    }

    public function render(): View
    {
        return view('settings::livewire.components.profile.publish');
    }
}
