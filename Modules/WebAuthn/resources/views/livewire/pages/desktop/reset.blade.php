@include('passkeys::livewire.partials.createScript')

<x-customtheme::page-layouts.auth>
    <x-slot name="topLeft">
        <x-webauthn::forms.reset />
    </x-slot>
</x-customtheme::page-layouts.auth>
