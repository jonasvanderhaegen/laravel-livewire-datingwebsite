@php
    $colors = ['3781FE', '37D6FE', 'FE3781', '8C38FE', '38FEA1', '0AFEE3', '3738FE'];
    $hex = Route::is('home') ? $colors[0] : fake()->randomElement($colors); // e.g. "FE3781"
    $fromClass = "from-[#{$hex}]";         // -> "from-[#FE3781]"
@endphp

<div
    class="absolute bottom-0 -z-1 h-[100vw] min-h-[800px] w-[100vw] min-w-[800px] overflow-hidden"
>
    <div
        class="absolute -bottom-[50vw] h-[100vw] min-h-[800px] w-[100vw] min-w-[800px] rounded-full bg-gradient-to-tl from-[#3781FE] to-[#1C0AC4]/0 to-80%"
    ></div>
    <div
        class="bg-noise absolute h-[100vw] min-h-[800px] w-[100vw] min-w-[800px]"
    ></div>
</div>
