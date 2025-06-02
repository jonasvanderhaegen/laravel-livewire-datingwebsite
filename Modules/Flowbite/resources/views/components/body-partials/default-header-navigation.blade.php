<header>
    <nav class="border-gray-200 bg-slate-200 py-2.5 dark:bg-slate-950">
        <div
            class="mx-auto flex max-w-5xl flex-wrap items-center justify-between px-4 xl:max-w-7xl 2xl:max-w-[90rem]"
        >
            <a
                href="{{ route('flowbite.home') }}"
                wire:navigate.hover
                class="flex items-center"
            >
                <img
                    src="https://flowbite.com/docs/images/logo.svg"
                    class="mr-3 h-6 sm:h-9"
                    alt="Flowbite Logo"
                />
                <span
                    class="self-center text-xl font-semibold whitespace-nowrap dark:text-white"
                >
                    Flowbite
                </span>
            </a>
            <div class="flex items-center lg:order-2">
                <x-flowbite::dark-toggle class="mr-1" />

                <a
                    href="#"
                    class="mr-2 rounded-lg px-4 py-2 text-sm font-medium text-gray-800 hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 focus:outline-none lg:px-5 lg:py-2.5 dark:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-800"
                >
                    Log in
                </a>

                <a
                    href="#"
                    class="mr-2 rounded-lg bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 focus:outline-none lg:px-5 lg:py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                >
                    Get started
                </a>

                <button
                    data-collapse-toggle="mobile-menu-2"
                    type="button"
                    class="ml-1 inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:ring-2 focus:ring-gray-200 focus:outline-none lg:hidden dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="mobile-menu-2"
                    aria-expanded="false"
                >
                    <span class="sr-only">Open main menu</span>
                    <svg
                        class="h-6 w-6"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                    <svg
                        class="hidden h-6 w-6"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                </button>
            </div>

            <div
                class="hidden w-full items-center justify-between lg:order-1 lg:flex lg:w-auto"
                id="mobile-menu-2"
            >
                <ul
                    class="mt-4 flex flex-col font-medium lg:mt-0 lg:flex-row lg:space-x-8"
                >
                    @foreach ($links as $name => $link)
                        <x-flowbite::body-partials.default-header-navigation.link
                            :route="$link"
                        >
                            {{ $name }}
                        </x-flowbite::body-partials.default-header-navigation.link>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
</header>
