<x-customtheme::page-layouts.auth>
    <x-slot name="topLeft">
        <x-auth::forms.verify-email/>
    </x-slot>


    <x-slot name="topRight">
        <x-customtheme::page-partials.auth.registration-onboarding-steps />
    </x-slot>
</x-customtheme::page-layouts.auth>
