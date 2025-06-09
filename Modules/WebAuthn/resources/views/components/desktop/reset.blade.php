<x-customtheme::page-layouts.auth>
    <x-slot name="topLeft">
        <form
            class="rounded-4xl bg-white p-8 shadow-md md:space-y-6 dark:bg-gray-800"
            action="#"
            wire:submit.prevent="submit"
        >
            <h1 class="text-xl font-bold text-gray-900 dark:text-white">
                {{ __('Resetting passkey') }}
            </h1>

            <fieldset class="space-y-4 md:space-y-6">
                <button
                    type="submit"
                    class="w-full rounded-full bg-blue-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-500 focus:ring-4 focus:ring-blue-300 focus:outline-none disabled:opacity-50 dark:bg-blue-500 dark:hover:bg-blue-500 dark:focus:ring-blue-800"
                >
                    <span>Request passkey prompt</span>
                </button>
            </fieldset>

            <a
                href="{{ route('login') }}"
                wire:navigate.hover
                class="flex cursor-pointer items-center justify-between text-sm font-medium text-blue-600 dark:text-blue-500"
            >
                <span>
                    <span class="text-xs text-gray-400">
                        Already have an account?
                    </span>
                    <br />
                    Log in here
                </span>

                <svg
                    class="ms-2 h-4 w-4 rtl:rotate-180"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 14 10"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9"
                    />
                </svg>
            </a>

            <a
                href="{{ route('passkeys.instructions') }}"
                wire:navigate.hover
                class="flex cursor-pointer items-center justify-between text-sm font-medium text-blue-600 dark:text-blue-500"
            >
                <span>
                    <span class="text-xs text-gray-400">
                        Highly recommended for first-timers
                    </span>
                    <br />
                    Read how to save passkey with registration
                </span>

                <svg
                    class="ms-2 h-4 w-4 rtl:rotate-180"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 14 10"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9"
                    />
                </svg>
            </a>
        </form>
    </x-slot>
</x-customtheme::page-layouts.auth>
