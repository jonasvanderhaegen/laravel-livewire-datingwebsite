<div
    @class([
        'mx-auto w-full max-w-5xl xl:max-w-7xl 2xl:max-w-[90rem]',
        'absolute top-20 left-1/2 -translate-x-1/2 px-4 text-white xl:top-1/2 xl:-translate-y-1/2 xl:px-0' => $image,
        'relative text-slate-900 dark:text-white' => ! $image,
    ])
>
    <h1
        class="mb-4 max-w-4xl text-2xl leading-none font-extrabold sm:text-3xl lg:text-4xl"
    >
        {{ $title }}
    </h1>
    <p class="text-lg font-bold">{!! $description !!}</p>
</div>
