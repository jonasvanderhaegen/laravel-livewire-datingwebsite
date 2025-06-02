<div>
    @if ($isMobile ?? false)
        <section class="bg-white dark:bg-gray-900">
            <x-flowbite::boxed-width class="pt-8 text-center">
                <x-slot name="body">
                    <div
                        class="mb-8 flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4 lg:mb-16"
                    >
                        <a
                            href="{{ route('passkey.request') }}"
                            wire:navigate.hover
                            class="flex cursor-pointer items-center justify-center text-center text-sm font-medium text-blue-600 dark:text-blue-500"
                        >
                            Read instructions for first time
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
                            href="{{ route('passkey.request') }}"
                            wire:navigate.hover
                            class="flex cursor-pointer items-center justify-center text-center text-sm font-medium text-orange-600 dark:text-orange-500"
                        >
                            Passkey is invalid or no passkey was found?
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

                        <h3
                            class="text-xl font-bold text-gray-400 md:mb-20 dark:text-white"
                        >
                            Click lock to log in
                        </h3>
                    </div>

                    <form class="z-1 mx-auto lg:mb-8" action="#">
                        <button
                            type="submit"
                            class="group isolate flex cursor-pointer px-10 transition duration-500 ease-out will-change-transform hover:scale-110"
                        >
                            <div
                                class="absolute top-8 left-20 z-0 size-55 self-center justify-self-center bg-blue-400/70 blur-3xl transition duration-500 ease-out group-hover:bg-blue-600/70 dark:bg-slate-950 dark:group-hover:bg-blue-500/70"
                                aria-hidden="true"
                            ></div>

                            <x-webauthn::svg.lock-password
                                class="z-1 w-full dark:hidden"
                            />
                            <x-webauthn::svg.lock-password-dark
                                class="z-1 hidden w-full dark:flex"
                            />
                        </button>
                    </form>
                </x-slot>
            </x-flowbite::boxed-width>

            <div
                class="z-2 -mt-20 -mb-5 bg-pink-200 pt-25 pb-10 sm:-mt-80 sm:pt-80 lg:pb-16 dark:bg-blue-950"
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
                            By making passkeys the primary way to register and
                            log in, it ensures our community stays genuine,
                            active, and free from wasted profiles. It also
                            grants you many benefits
                        </p>
                    </x-slot>
                </x-flowbite::boxed-width>
            </div>
        </section>

        <x-webauthn::info-webauthn />
    @else
    @endif
</div>
