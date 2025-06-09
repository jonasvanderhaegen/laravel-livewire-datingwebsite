<div>
    <x-flowbite::mobile-desktop>
        <x-slot name="mobile">
            <x-auth::mobile.forgot :intent="$intent" />
        </x-slot>
        <x-slot name="desktop">
            <x-auth::desktop.forgot :intent="$intent" />
        </x-slot>
    </x-flowbite::mobile-desktop>
</div>
