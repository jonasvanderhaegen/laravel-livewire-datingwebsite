<x-settings::action-section>
    <x-slot name="title">Location</x-slot>

    <x-slot name="description">
        This is required to to ensure all users you live where you say you live.
        Its sole purpose is to be used as a radius filter. In case this is
        disabled later you will be asked to enable it again.
    </x-slot>

    <x-slot name="content">
        <div class="relative col-span-4 block w-full">
            <svg
                @class([
                    'mb-4 h-12 w-12',
                    $locationEnabled ? 'text-green-400' : 'text-red-500',
                ])
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                fill="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    fill-rule="evenodd"
                    d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                    clip-rule="evenodd"
                />
            </svg>

            <h1
                class="leding-tight mb-2 text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white"
            >
                @if ($locationEnabled)
                    Location tracking accepted
                @else
                        Location tracking not accepted (yet)
                @endif
            </h1>

            <p
                class="mb-4 font-light text-gray-500 md:mb-6 dark:text-gray-400"
            ></p>

            <p class="text-gray-700 dark:text-white">
                Click the button to request a prompt,
                <br />
                it will show a prompt for the first time to accept or decline
                sharing your location.
            </p>

            <div class="mt-5 flex items-center justify-end">
                <x-settings::action-message class="me-3" on="saved">
                    {{ __('Saved.') }}
                </x-settings::action-message>

                <x-settings::button wire:click="dispatchToScript" color="primary">
                    <span class="hidden md:block">
                        Validate Location tracking permissions
                    </span>
                    <span class="md:hidden">Validate</span>
                </x-settings::button>

                <x-settings::location-script />
            </div>
        </div>
    </x-slot>
</x-settings::action-section>
