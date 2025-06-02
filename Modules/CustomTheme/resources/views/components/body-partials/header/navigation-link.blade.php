@props(['hidden' => false, 'route' => 'home', 'label' => 'give it a label'])

<a
    href="{{ route($route) }}"
    wire:navigate.hover
    class="{{ $hidden ? 'hidden lg:block' : '' }} opacity-60 transition duration-200 hover:opacity-100"
    @if ($route === 'home')
        wire:current.exact="font-medium !opacity-100 hover:!opacity-100"
    @else
        wire:current="font-medium !opacity-100 hover:!opacity-100"
    @endif
    aria-current="{{ request()->routeIs('route1*') ? 'page' : 'false' }}"
>
    {{ $label }}
</a>
