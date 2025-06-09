<x-flowbite::boxed-width
    @class([
        'w-full',
        'absolute top-20 left-1/2 -translate-x-1/2 px-4 text-white xl:top-1/2 xl:-translate-y-1/2' => $image,
        'relative text-white' => ! $image,
    ])
>
    <x-slot name="body">
        <h1
            class="mb-4 max-w-4xl text-2xl leading-none font-extrabold sm:text-3xl lg:text-4xl"
        >
            {{ $title }}
        </h1>
        <p class="text-lg font-bold">{!! $description !!}</p>
    </x-slot>
</x-flowbite::boxed-width>
