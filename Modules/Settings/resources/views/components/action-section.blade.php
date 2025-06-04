<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6']) }}>
    <x-settings::section-title :nav="isset($nav)">
        <x-slot name="title">{{ $title }}</x-slot>
        @isset($description)
            <x-slot name="description">{{ $description }}</x-slot>
        @endisset

        @isset($aside)
            <x-slot name="aside">{{ $aside }}</x-slot>
        @endisset

        @isset($nav)
            <x-slot name="nav">{{ $nav }}</x-slot>
        @endisset
    </x-settings::section-title>

    <div class="mt-5 md:col-span-2 md:mt-0">
        <div class="rounded-4xl bg-white px-6 py-8 shadow dark:bg-gray-800">
            {{ $content }}
        </div>
    </div>
</div>
