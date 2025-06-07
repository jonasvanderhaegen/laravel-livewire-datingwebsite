<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Components\Profile;

use Illuminate\View\View;
use Livewire\Component;

final class SocialMedia extends Component
{
    public function render(): View
    {
        return view('settings::livewire.components.profile.social-media');
    }
}
