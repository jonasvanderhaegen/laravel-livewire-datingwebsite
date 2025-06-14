<section class="">
    <x-flowbite::boxed-width class="py-8 sm:py-16 lg:py-24">
        <x-slot name="body">
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 lg:gap-16">
                <div class="mx-auto lg:w-full flex items-center justify-center lg:block">
                    {{ $topLeft }}
                </div>

                @isset($topRight)
                    {{ $topRight }}
                @else
                    <x-customtheme::page-partials.auth.top-right-placeholder />
                @endisset
            </div>

            <div
                class="mt-8 grid grid-cols-1 gap-8 lg:mt-20 lg:grid-cols-2 lg:gap-16"
            >
                @isset($bottomLeft)
                    {{ $bottomLeft }}
                @else
                    <x-customtheme::page-partials.auth.bottom-left-placeholder />
                @endisset

                <div class="hidden lg:block">
                    @isset($bottomRight)
                        {{ $bottomRight }}
                    @else
                        <x-flowbite::svg.security-biometrics class="w-full" />
                    @endisset
                </div>
            </div>
        </x-slot>
    </x-flowbite::boxed-width>
</section>
