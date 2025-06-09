<div>
    <x-flowbite::mobile-desktop>
        <x-slot name="mobile">
            <x-webauthn::mobile.register />
        </x-slot>

        <x-slot name="desktop">
            <x-webauthn::desktop.register />
        </x-slot>
    </x-flowbite::mobile-desktop>

    @include('passkeys::livewire.partials.createScript')
</div>
