<?php

declare(strict_types=1);

namespace Modules\Testimonial\Livewire\Pages;

use Illuminate\View\View;
use Livewire\WithPagination;
use Modules\CustomTheme\Livewire\Layouts\General;
use Modules\Testimonial\Models\Testimonial;

final class Index extends General
{
    use WithPagination;

    public function render(): View
    {
        $testimonials = Testimonial::where('show', 1)
            ->orderBy('review', 'desc')
            ->paginate(6);

        return view('testimonial::livewire.pages.index', [
            'testimonials' => $testimonials,
        ])->title(__('Testimonials'));
    }
}
