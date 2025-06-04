<x-settings::page-layouts.settings>
    <div class="mt-10 sm:mt-0">
        @livewire('settings::components.profile.general')
    </div>

    <x-settings::section-border />

    <div class="mt-10 sm:mt-0">
        @livewire('settings::components.profile.publish')
    </div>

    <x-settings::section-border />

    <div class="mt-10 sm:mt-0">
        @livewire('settings::components.profile.social-media')
    </div>
</x-settings::page-layouts.settings>
