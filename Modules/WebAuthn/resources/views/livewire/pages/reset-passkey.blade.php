<div>
    @if ($isMobile ?? false)
        <section class="bg-white dark:bg-gray-900">
            <x-flowbite::boxed-width class="pt-8">
                <x-slot name="body">
                    <div
                        class="mb-8 flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4 lg:mb-16"
                    >
                        <div
                            class="w-full rounded-lg bg-white shadow sm:max-w-md md:mt-0 xl:p-0 dark:border dark:border-gray-700 dark:bg-gray-800"
                        >
                            <div class="space-y-4 p-6 sm:p-8 md:space-y-6">
                                <form
                                    class="w-full max-w-md space-y-4 md:space-y-6 xl:max-w-xl"
                                    action="#"
                                    wire:submit.prevent="submit"
                                >
                                    <h1
                                        class="text-xl font-bold text-gray-900 dark:text-white"
                                    >
                                        {{ __('Registration') }}
                                    </h1>

                                    <a
                                        href="{{ route('home') }}"
                                        wire:navigate.hover
                                        class="mb-8 flex cursor-pointer items-center justify-start text-sm font-medium text-blue-500"
                                    >
                                        <span>
                                            Read how to save passkey with
                                            registration
                                            <br />
                                            <span class="text-xs text-gray-400">
                                                Highly recommended for
                                                first-timers
                                            </span>
                                        </span>

                                        <svg
                                            class="ms-6 h-4 w-4 rtl:rotate-180"
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

                                    <fieldset class="space-y-4 md:space-y-6">
                                        <x-flowbite::input.text-field
                                            field="form.email"
                                            type="email"
                                            :label="__('E-mail address')"
                                            :helper="__('For example: john.doe@example.com')"
                                            required
                                        />

                                        <button
                                            type="submit"
                                            class="w-full rounded-full bg-blue-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-500 focus:ring-4 focus:ring-blue-300 focus:outline-none disabled:opacity-50 dark:bg-blue-500 dark:bg-blue-800 dark:hover:bg-blue-500 dark:focus:ring-blue-800"
                                        >
                                            <span>Register</span>
                                        </button>
                                    </fieldset>

                                    <p
                                        class="text-sm font-light text-gray-500 dark:text-gray-400"
                                    >
                                        Already have an account?
                                        <a
                                            href="{{ route('login') }}"
                                            wire:navigate.hover
                                            class="font-medium text-blue-500 hover:underline dark:text-blue-500"
                                        >
                                            Sign In
                                        </a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>

                    <x-webauthn::svg.security-biometrics
                        class="z-1 mx-auto w-full lg:mb-8 dark:flex"
                    />
                </x-slot>
            </x-flowbite::boxed-width>

            <div
                class="z-2 -mt-60 bg-pink-200 pt-60 pb-10 sm:-mt-80 sm:pt-80 lg:pb-16 dark:bg-blue-950"
            >
                <x-flowbite::boxed-width class="mt-8 text-center">
                    <x-slot name="body">
                        <h2
                            class="mb-4 text-3xl font-extrabold tracking-tight text-white"
                        >
                            Passkeys
                        </h2>
                        <p
                            class="font-light text-pink-500 sm:text-xl dark:text-gray-400"
                        >
                            By making passkeys the blue way to register and log
                            in, it ensures our community stays genuine, active,
                            and free from wasted profiles. It also grants you
                            many benefits
                        </p>
                    </x-slot>
                </x-flowbite::boxed-width>
            </div>
        </section>

        <x-webauthn::info-webauthn />
    @else
        <x-customtheme::page-layouts.horizontal-split-left-page>
            <x-slot name="left">
                <form
                    class="w-full max-w-md space-y-4 md:space-y-6 xl:max-w-xl"
                    action="#"
                    wire:submit.prevent="submit"
                >
                    <h1 class="text-xl font-bold text-gray-900 dark:text-white">
                        {{ __('Resetting passkey') }}
                    </h1>

                    <a
                        href="{{ route('passkeys.instructions') }}"
                        wire:navigate.hover
                        class="mb-8 flex cursor-pointer items-center justify-start text-sm font-medium text-blue-600 dark:text-blue-500"
                    >
                        <span>
                            Read how to save passkey with resetting
                            <br />
                            <span class="text-xs text-gray-400">
                                Highly recommended for first-timers
                            </span>
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

                    <fieldset class="space-y-4 md:space-y-6">
                        <button
                            type="submit"
                            class="w-full rounded-full bg-blue-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-500 focus:ring-4 focus:ring-blue-300 focus:outline-none disabled:opacity-50 dark:bg-blue-500 dark:hover:bg-blue-500 dark:focus:ring-blue-800"
                        >
                            <span>Request passkey prompt</span>
                        </button>
                    </fieldset>

                    <p
                        class="text-sm font-light text-gray-500 dark:text-gray-400"
                    >
                        Already have an account?
                        <a
                            href="{{ route('login') }}"
                            wire:navigate.hover
                            class="font-medium text-blue-500 hover:underline dark:text-blue-500"
                        >
                            Sign In
                        </a>
                    </p>
                </form>
            </x-slot>
        </x-customtheme::page-layouts.horizontal-split-left-page>

        <x-webauthn::info-webauthn />
    @endif

    @include('passkeys::livewire.partials.createScript')
</div>
