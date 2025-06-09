<div>
    <x-flowbite::mobile-desktop>
        <x-slot name="mobile">
            <x-webauthn::mobile.login />
        </x-slot>

        <x-slot name="desktop">
            <x-webauthn::desktop.login />
        </x-slot>
    </x-flowbite::mobile-desktop>
    <x-webauthn::authenticate-script />
</div>
