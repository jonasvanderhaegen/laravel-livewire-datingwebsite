<?php

declare(strict_types=1);

namespace Modules\Page\Livewire\Pages;

use Illuminate\View\View;
use Modules\CustomTheme\Livewire\Layouts\General;

final class TermsConditions extends General
{
    public function render(): View
    {
        return view('page::livewire.pages.terms-conditions')
            ->title(__('Terms and Conditions'));
    }
}
