<?php

declare(strict_types=1);

namespace Modules\Testimonial\Livewire\Pages;

use Livewire\WithPagination;
use Modules\CustomTheme\Livewire\Layouts\General;
use Modules\Testimonial\Models\Testimonial;

final class Index extends General
{
    use WithPagination;

    // 20 items per page

    // use Tailwind’s styling for the links

    public function render()
    {
        $testimonials = Testimonial::where('show', 1)
            ->orderBy('review', 'desc')
            ->paginate(6);

        return view('testimonial::livewire.pages.index', [
            'testimonials' => $testimonials,
        ])->title(__('Testimonials'));
    }
}
