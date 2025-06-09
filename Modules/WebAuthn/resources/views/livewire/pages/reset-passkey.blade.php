<div>
    <x-flowbite::mobile-desktop>
        <x-slot name="mobile">
            <x-webauthn::mobile.reset />
        </x-slot>

        <x-slot name="desktop">
            <x-webauthn::desktop.reset />
        </x-slot>
    </x-flowbite::mobile-desktop>

    @include('passkeys::livewire.partials.createScript')
</div>
