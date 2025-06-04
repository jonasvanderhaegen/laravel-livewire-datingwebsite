<main class="bg-slate-50 px-4 lg:px-6 dark:bg-gray-900">
    <x-flowbite::boxed-width>
        <x-slot name="body">
            <div class="flex flex-wrap items-center justify-between">
                <div class="pt-4">
                    <nav class="mb-4 flex" aria-label="Breadcrumb">
                        <ol
                            class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse"
                        >
                            <li class="inline-flex items-center">
                                <a
                                    href="{{ route('home') }}"
                                    wire:navigate.hover
                                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-700 dark:text-gray-400 dark:hover:text-white"
                                >
                                    <svg
                                        class="me-2.5 h-4 w-4"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M11.3 3.3a1 1 0 0 1 1.4 0l6 6 2 2a1 1 0 0 1-1.4 1.4l-.3-.3V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3c0 .6-.4 1-1 1H7a2 2 0 0 1-2-2v-6.6l-.3.3a1 1 0 0 1-1.4-1.4l2-2 6-6Z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                    Home
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg
                                        class="mx-1 h-4 w-4 text-gray-400 rtl:rotate-180"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="m9 5 7 7-7 7"
                                        />
                                    </svg>
                                    <a
                                        href="#"
                                        class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-700 md:ms-2 dark:text-gray-400 dark:hover:text-white"
                                    >
                                        User
                                    </a>
                                </div>
                            </li>
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg
                                        class="mx-1 h-4 w-4 text-gray-400 rtl:rotate-180"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="m9 5 7 7-7 7"
                                        />
                                    </svg>
                                    <span
                                        class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400"
                                    >
                                        Settings
                                    </span>
                                </div>
                            </li>
                        </ol>
                    </nav>
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
