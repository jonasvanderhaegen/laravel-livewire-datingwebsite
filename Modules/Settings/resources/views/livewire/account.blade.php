<x-settings::page-layouts.settings>
    <div class="mt-10 sm:mt-0">
        @livewire('settings::components.account.general-component')
    </div>

    <x-settings::section-border />

    @if ($passkeys)
        <div class="mt-10 mb-4 sm:mt-0">
            @livewire('settings::components.account.pass-keys-component')
        </div>
    @endif

    @if ($passwords)
        <div class="mt-10 sm:mt-0">
            @livewire('settings::components.account.update-password-component')
        </div>
    @endif

    <x-settings::section-border />

    <div class="mt-10 sm:mt-0">
        @livewire('settings::components.account.location-component')
    </div>

    <x-settings::section-border />

    <div class="mt-10 sm:mt-0">
        @livewire('settings::components.account.user-data-request-component')
    </div>

    <x-settings::section-border />

    <div class="mt-10 sm:mt-0">
        @livewire('settings::components.account.delete-user-component')
    </div>
</x-settings::page-layouts.settings>
