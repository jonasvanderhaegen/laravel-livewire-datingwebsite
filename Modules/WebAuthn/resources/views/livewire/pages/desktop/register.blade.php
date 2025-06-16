<x-customtheme::page-layouts.auth :activeTab="$this->activeTab">
    <x-slot name="topLeft">

        <x-webauthn::forms.registration />

    </x-slot>

    <x-slot name="topRight">
        <x-customtheme::page-partials.auth.registration-onboarding-steps />
    </x-slot>
</x-customtheme::page-layouts.auth>
