<?php

declare(strict_types=1);

namespace Modules\Testimonial\Livewire;

use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Modules\Testimonial\Models\Testimonial;

final class HomeCarouselComponent extends Component
{
    public function render()
    {
        // TODO: Get data into a CDN or Json file
        $testimonials = Cache::rememberForever('home_testimonials_first_20', fn () => Testimonial::where('show', 1)
            ->orderBy('review', 'desc')
            ->take(20)
            ->get()
        );

        return view('testimonial::livewire.home-carousel-component', compact('testimonials'));
    }
}
