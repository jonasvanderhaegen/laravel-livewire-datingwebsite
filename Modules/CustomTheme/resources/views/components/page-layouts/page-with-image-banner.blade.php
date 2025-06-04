@props([
    'title' => 'No title given yet',
    'description' => 'No description given yet',
    'image' => 'https://raw.githubusercontent.com/creativetimofficial/public-assets/master/twcomponents/header.webp',
])

<main
    @class([
        'pb-16 antialiased lg:pb-24',
        'bg-slate-50 dark:bg-gray-900' => $isMobile ?? false,
    ])
>
    <x-customtheme::page-partials.page-with-image-banner.header
        :image="$image"
    >
        <x-customtheme::page-partials.page-with-image-banner.header-title
            :image="(bool) $image"
            :title="$title"
            :description="$description"
        />
    </x-customtheme::page-partials.page-with-image-banner.header>

    <x-customtheme::page-partials.page-with-image-banner.body
        :image="(bool) $image"
    >
        <x-slot name="body">
            {{ $body }}
        </x-slot>

        @isset($aside)
            <x-slot name="aside">
                {{ $aside }}
            </x-slot>
        @endisset

        @isset($underbody)
            <x-slot name="underbody">
                {{ $underbody }}
            </x-slot>
        @endisset
    </x-customtheme::page-partials.page-with-image-banner.body>
</main>
