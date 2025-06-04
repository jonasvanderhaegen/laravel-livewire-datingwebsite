<div>
    @foreach ($testimonials as $testimonial)
        <figure
            class="mx-auto hidden w-full max-w-screen-md"
            data-carousel-item
        >
            <blockquote
                class="text-lg font-medium text-white italic sm:text-2xl"
            >
                “{{ $testimonial->short }}“
            </blockquote>
            <figcaption class="mt-6 flex items-center justify-center space-x-3">
                <div class="flex items-center divide-x-2 divide-gray-300">
                    <div class="pr-3 font-medium text-white">
                        {{ $testimonial->firstname }}
                        @if ($testimonial->lastname)
                                {{ $testimonial->last_initial }}.
                        @endif
                    </div>
                    <div class="pl-3 text-sm font-bold text-white">
                        @if ($testimonial->match)
                            {{ __('Found a match in') }}
                            {{ $testimonial->amount }}
                            @if ($testimonial->time === 'h')
                                {{ $testimonial->amount === 1 ? __('hour') : __('hours') }}
                            @else
                                {{ $testimonial->amount === 1 ? __('day') : __('days') }}
                            @endif
                        @else
                            {{ __('Perhaps still searching') }}
                        @endif
                    </div>
                </div>
            </figcaption>
        </figure>
    @endforeach
</div>
