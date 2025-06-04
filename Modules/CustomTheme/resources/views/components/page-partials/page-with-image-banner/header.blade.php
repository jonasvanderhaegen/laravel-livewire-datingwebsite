<header
    @class([
        'relative',
        'h-[460px] w-full bg-[image:var(--bg-img)] bg-cover bg-center bg-no-repeat xl:h-[537px]' => $image,
        'p-10' => ! $image,
    ])
    @if ($image)
        style="--bg-img: url('{{ $image }}');"
    @endif
>
    {{ $slot }}
</header>
