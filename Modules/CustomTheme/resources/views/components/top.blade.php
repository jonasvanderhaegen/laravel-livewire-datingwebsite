@php
    $colors = ['57D3D2', '37D6FE', 'FE3781', '8C38FE', '38FEA1', '0AFEE3', '3738FE'];
    $hex = Route::is('home') ? $colors[0] : fake()->randomElement($colors); // e.g. "FE3781"
    $fromClass = "from-[#{$hex}]";         // -> "from-[#FE3781]"
@endphp

<div
    class="pointer-events-none absolute -top-[20vw] -left-[30%] aspect-square h-[100vw] max-h-full min-h-[800px] overflow-hidden rounded-full"
>
    <div class="bg-noise absolute top-0 left-0 -z-1 h-full w-full"></div>
    <div
        class="absolute top-0 left-0 -z-2 h-full w-full -rotate-[30] transform bg-gradient-to-br from-[#57D3D2] to-[#43CBCA]/0 to-75%"
    ></div>
</div>
