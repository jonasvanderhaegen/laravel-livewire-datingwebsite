@props([
    /**
     * @var string $route
     *             — The *named* route you want this link to point to.
     *             For example: "home", "posts.index", "about.show", etc.
     **/
    'route',
])

@php
    // If a route name was given, generate its URL and check “isActive”.
    $href = $route ? route($route) : '#';

    // Only check routeIs() when $route is non‐empty. Otherwise, never “active.”
    $isActive = $route && request()->routeIs("{$route}*");

    // Base classes applied to every <a>
    $baseClasses = 'block py-2 pr-4 pl-3 lg:p-0';

    // Styles applied on larger screens regardless of active/inactive
    $commonResponsive = '';

    // Inactive state styles
    $inactiveClasses = '
                text-gray-700
                dark:text-gray-400
                dark:hover:text-white
            ';

    // Active state styles
    $activeClasses = '
                text-white
                lg:text-blue-700
                dark:text-white
            ';

    // Pick the correct state at render‐time
    $stateClasses = $isActive ? $activeClasses : $inactiveClasses;
@endphp

<li>
    <a
        wire:navigate.hover
        href="{{ $href }}"
        {{
            $attributes->merge([
                // Merge any custom “class=” from parent with our computed classes.
                'class' => mb_trim("{$baseClasses} {$stateClasses} {$commonResponsive}"),
            ])
        }}
    >
        {{ $slot }}
    </a>
</li>
