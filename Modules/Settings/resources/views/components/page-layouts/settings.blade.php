<main>
    <x-flowbite::boxed-width
        @class([
            'px-4 lg:px-6 rounded-4xl ',
            $isMobile ?? false ? 'bg-slate-50 dark:bg-gray-900' : ' backdrop-blur-md transition duration-200 ease-out dark:bg-slate-950/60 bg-slate-50 2xl:max-w-[93rem] !px-9 py-4',
        ])
    >
        <x-slot name="body">
            <div class="flex flex-wrap items-center justify-between">
                <div class="pt-4">

                    <h1 class="text-xl font-bold text-gray-900 dark:text-white">
                        Settings
                    </h1>

                    <p
                        class="text-sm text-gray-500 md:text-xl dark:text-gray-400"
                    >
                        <a
                            href="{{ route('settings.profile-preview') }}"
                            wire:navigate.hover
                            class="inline-flex items-center font-medium text-blue-500 hover:underline"
                        >
                            View my profile
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
                    </p>
                </div>

                <div
                    class="-me-4 gap-4 md:-me-0 md:py-4 xl:grid xl:grid-cols-2"
                >
                    <div
                        class="col-span-2 rounded-lg md:mb-4 md:rounded-full md:bg-white md:p-4 md:shadow-sm xl:mb-0 md:dark:bg-gray-800"
                    >
                        <ul
                            class="mt-5 space-y-2 text-right text-sm font-medium text-gray-500 md:mt-0 md:flex md:space-y-0 md:space-x-4 md:text-center md:text-left dark:text-gray-400"
                        >
                            <li>
                                <a
                                    href="{{ route('settings.profile') }}"
                                    wire:navigate.hover
                                    wire:current="text-white bg-blue-500 dark:bg-blue-500 hover:!bg-blue-500 dark:hover:!bg-blue-500 hover:!text-gray-100"
                                    class="inline-block rounded-full px-4 py-1 hover:bg-gray-100 hover:text-gray-900 md:py-3 dark:hover:bg-gray-800 dark:hover:text-white"
                                    aria-current="page"
                                >
                                    Profile
                                </a>
                            </li>

                            <li>
                                <a
                                    href="{{ route('settings.images') }}"
                                    wire:navigate.hover
                                    wire:navigate.hover
                                    wire:current="text-white dark:bg-blue-500 bg-blue-500 hover:!bg-blue-500 dark:hover:!bg-blue-500 hover:!text-gray-100"
                                    class="inline-block rounded-full px-4 py-1 hover:bg-gray-100 hover:text-gray-900 md:py-3 dark:hover:bg-gray-800 dark:hover:text-white"
                                >
                                    Images
                                </a>
                            </li>

                            <li>
                                <a
                                    href="{{ route('settings.preferences') }}"
                                    wire:navigate.hover
                                    wire:navigate.hover
                                    wire:current="text-white dark:bg-blue-500 bg-blue-500 hover:!bg-blue-500 dark:hover:!bg-blue-500 hover:!text-gray-100"
                                    class="inline-block rounded-full px-4 py-1 hover:bg-gray-100 hover:text-gray-900 md:py-3 dark:hover:bg-gray-800 dark:hover:text-white"
                                >
                                    Preferences
                                </a>
                            </li>

                            <li>
                                <a
                                    href="{{ route('settings.account') }}"
                                    wire:navigate.hover
                                    wire:navigate.hover
                                    wire:current="text-white dark:bg-blue-500 bg-blue-500 hover:!bg-blue-500 dark:hover:!bg-blue-500 hover:!text-gray-100"
                                    class="inline-block rounded-full px-4 py-1 hover:bg-gray-100 hover:text-gray-900 md:py-3 dark:hover:bg-gray-800 dark:hover:text-white"
                                >
                                    Account
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="py-8">
                {{ $slot }}
            </div>
        </x-slot>
    </x-flowbite::boxed-width>
</main>
