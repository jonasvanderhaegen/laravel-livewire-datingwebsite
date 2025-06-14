<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Components\Profile;

use Illuminate\View\View;
use Livewire\Component;
use Masmerise\Toaster\Toaster;
use Modules\Profile\Models\Profile;

// @codeCoverageIgnoreStart
final class Publish extends Component
{
    public bool $public = false;

    public Profile $profile;

    public function mount(): void
    {
        /** @var Profile $p */
        $p = auth()->user()->profile;
        $this->profile = $p;
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
// @codeCoverageIgnoreEnd
