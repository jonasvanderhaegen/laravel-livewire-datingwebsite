<div>
    <x-customtheme::page-layouts.page-with-image-banner
        :title="__('Browse overview page')"
        :description="__('Active right now based on your filter') . ': ' . $results->total()"
        :image="false"
    >
        <x-slot name="body">

            <div class="mb-4 items-end justify-between sm:flex">
                <div class="mb-4 sm:mb-0">

                </div>
                <div class="flex items-center space-x-4 sm:space-x-0">
                    <button
                        data-drawer-target="drawer-mobile-filter"
                        data-drawer-show="drawer-mobile-filter"
                        aria-controls="drawer-mobile-filter"
                        type="button"
                        class="flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 focus:outline-none sm:w-auto lg:hidden dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700"
                    >
                        <svg
                            class="-ms-0.5 me-2 h-4 w-4"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="none"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-width="2"
                                d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z"
                            />
                        </svg>
                        Filters
                        <svg
                            class="ms-2 -me-0.5 h-4 w-4"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="none"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="m19 9-7 7-7-7"
                            />
                        </svg>
                    </button>
                    <button
                        id="sortDropdownButton2"
                        data-dropdown-toggle="dropdownSort2"
                        type="button"
                        class="flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 focus:outline-none sm:w-auto dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700"
                    >
                        <svg
                            class="-ms-0.5 me-2 h-4 w-4"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="none"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M7 4v16M7 4l3 3M7 4 4 7m9-3h6l-6 6h6m-6.5 10 3.5-7 3.5 7M14 18h4"
                            />
                        </svg>
                        Sort
                        <svg
                            class="ms-2 -me-0.5 h-4 w-4"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="none"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="m19 9-7 7-7-7"
                            />
                        </svg>
                    </button>
                    <div
                        id="dropdownSort2"
                        class="z-50 hidden w-40 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700"
                        data-popper-placement="bottom"
                    >
                        <ul
                            class="p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400"
                            aria-labelledby="sortDropdownButton"
                        >
                            <li>
                                <a
                                    href="#"
                                    class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                >
                                    The most popular
                                </a>
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                >
                                    Newest
                                </a>
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                >
                                    Increasing price
                                </a>
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                >
                                    Decreasing price
                                </a>
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                >
                                    No. reviews
                                </a>
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                >
                                    Discount %
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            {{ $results->links() }}

            <div class="gap-6 lg:flex">
                <!-- Sidenav -->
                <aside
                    id="sidebar"
                    class="hidden h-full w-80 shrink-0 border border-gray-200 bg-white p-4 shadow-sm lg:block lg:rounded-lg dark:border-gray-700 dark:bg-gray-800"
                >
                    <div
                        id="accordion-flush"
                        data-accordion="collapse"
                        data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
                        data-inactive-classes="text-gray-500 dark:text-gray-400"
                    >
                        <h2 id="accordion-flush-heading-1">
                            <button
                                type="button"
                                class="mb-4 flex w-full items-center justify-between font-medium text-gray-500 hover:text-gray-900 rtl:text-right dark:!bg-gray-800 dark:bg-transparent dark:text-gray-400 dark:hover:text-white"
                                data-accordion-target="#accordion-flush-body-1"
                                aria-expanded="true"
                                aria-controls="accordion-flush-body-1"
                            >
                                <span>Categories</span>
                                <svg
                                    data-accordion-icon
                                    class="h-5 w-5 shrink-0 rotate-180"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m5 15 7-7 7 7"
                                    />
                                </svg>
                            </button>
                        </h2>
                        <div
                            id="accordion-flush-body-1"
                            class="mb-4 hidden space-y-4"
                            aria-labelledby="accordion-flush-heading-1"
                        >
                            <div>
                                <label
                                    for="search"
                                    class="sr-only mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >
                                    Search
                                </label>
                                <div class="relative block">
                                    <div
                                        class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3"
                                    >
                                        <svg
                                            class="h-4 w-4 text-gray-500 dark:text-gray-400"
                                            aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 20 20"
                                        >
                                            <path
                                                stroke="currentColor"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
                                            />
                                        </svg>
                                    </div>
                                    <input
                                        type="search"
                                        id="search"
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 ps-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                        placeholder="Search for categories"
                                        required
                                    />
                                </div>
                            </div>

                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <input
                                        id="tv-audio-video"
                                        type="checkbox"
                                        value=""
                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    />
                                    <label
                                        for="tv-audio-video"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >
                                        TV, Audio-Video
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input
                                        id="desktop-pc"
                                        type="checkbox"
                                        value=""
                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                        checked
                                    />
                                    <label
                                        for="desktop-pc"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >
                                        Desktop PC
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input
                                        id="gaming"
                                        type="checkbox"
                                        value=""
                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    />
                                    <label
                                        for="gaming"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >
                                        Gaming
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input
                                        id="monitors"
                                        type="checkbox"
                                        value=""
                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    />
                                    <label
                                        for="monitors"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >
                                        Monitors
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input
                                        id="laptops"
                                        type="checkbox"
                                        value=""
                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                        checked
                                    />
                                    <label
                                        for="laptops"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >
                                        Laptops
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input
                                        id="console"
                                        type="checkbox"
                                        value=""
                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    />
                                    <label
                                        for="console"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >
                                        Console
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input
                                        id="tablets"
                                        type="checkbox"
                                        value=""
                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                        checked
                                    />
                                    <label
                                        for="tablets"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >
                                        Tablets
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input
                                        id="foto"
                                        type="checkbox"
                                        value=""
                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    />
                                    <label
                                        for="foto"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >
                                        Foto
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input
                                        id="fashion"
                                        type="checkbox"
                                        value=""
                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    />
                                    <label
                                        for="fashion"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >
                                        Fashion
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input
                                        id="books"
                                        type="checkbox"
                                        value=""
                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    />
                                    <label
                                        for="books"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >
                                        Books
                                    </label>
                                </div>
                            </div>

                            <a
                                href="#"
                                title=""
                                class="inline-flex items-center gap-1 text-sm font-medium text-blue-700 hover:underline dark:text-blue-500"
                            >
                                See more
                                <svg
                                    class="h-5 w-5"
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
                                        d="M19 12H5m14 0-4 4m4-4-4-4"
                                    />
                                </svg>
                            </a>
                        </div>
                        <h2 id="accordion-flush-heading-2">
                            <button
                                type="button"
                                class="mb-4 flex w-full items-center justify-between font-medium text-gray-500 hover:text-gray-900 rtl:text-right dark:!bg-gray-800 dark:text-gray-400 dark:hover:text-white"
                                data-accordion-target="#accordion-flush-body-2"
                                aria-expanded="true"
                                aria-controls="accordion-flush-body-2"
                            >
                                <span>Rating</span>
                                <svg
                                    data-accordion-icon
                                    class="h-5 w-5 shrink-0 rotate-180"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m5 15 7-7 7 7"
                                    />
                                </svg>
                            </button>
                        </h2>
                        <div
                            id="accordion-flush-body-2"
                            class="mb-4 hidden space-y-4"
                            aria-labelledby="accordion-flush-heading-2"
                        >
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <input
                                        id="rating-checkbox-1"
                                        type="checkbox"
                                        value=""
                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                        checked
                                    />
                                    <label
                                        for="rating-checkbox-1"
                                        class="ms-2 inline-flex items-center gap-1.5 text-sm font-medium text-gray-500 dark:text-gray-400"
                                    >
                                        <div class="flex items-center gap-0.5">
                                            <svg
                                                class="h-5 w-5 text-yellow-400"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"
                                                />
                                            </svg>
                                            <svg
                                                class="h-5 w-5 text-yellow-400"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"
                                                />
                                            </svg>
                                            <svg
                                                class="h-5 w-5 text-yellow-400"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"
                                                />
                                            </svg>
                                            <svg
                                                class="h-5 w-5 text-yellow-400"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"
                                                />
                                            </svg>
                                            <svg
                                                class="h-5 w-5 text-yellow-400"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"
                                                />
                                            </svg>
                                        </div>
                                        (475)
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input
                                        id="rating-checkbox-2"
                                        type="checkbox"
                                        value=""
                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                        checked
                                    />
                                    <label
                                        for="rating-checkbox-2"
                                        class="ms-2 inline-flex items-center gap-1.5 text-sm font-medium text-gray-500 dark:text-gray-400"
                                    >
                                        <div class="flex items-center gap-0.5">
                                            <svg
                                                class="h-5 w-5 text-yellow-400"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"
                                                />
                                            </svg>
                                            <svg
                                                class="h-5 w-5 text-yellow-400"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"
                                                />
                                            </svg>
                                            <svg
                                                class="h-5 w-5 text-yellow-400"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"
                                                />
                                            </svg>
                                            <svg
                                                class="h-5 w-5 text-yellow-400"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"
                                                />
                                            </svg>
                                            <svg
                                                class="h-5 w-5 text-gray-300 dark:text-gray-600"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"
                                                />
                                            </svg>
                                        </div>
                                        (12)
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input
                                        id="rating-checkbox-3"
                                        type="checkbox"
                                        value=""
                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    />
                                    <label
                                        for="rating-checkbox-3"
                                        class="ms-2 inline-flex items-center gap-1.5 text-sm font-medium text-gray-500 dark:text-gray-400"
                                    >
                                        <div class="flex items-center gap-0.5">
                                            <svg
                                                class="h-5 w-5 text-yellow-400"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"
                                                />
                                            </svg>
                                            <svg
                                                class="h-5 w-5 text-yellow-400"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"
                                                />
                                            </svg>
                                            <svg
                                                class="h-5 w-5 text-yellow-400"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"
                                                />
                                            </svg>
                                            <svg
                                                class="h-5 w-5 text-gray-300 dark:text-gray-600"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"
                                                />
                                            </svg>
                                            <svg
                                                class="h-5 w-5 text-gray-300 dark:text-gray-600"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"
                                                />
                                            </svg>
                                        </div>
                                        (20)
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input
                                        id="rating-checkbox-4"
                                        type="checkbox"
                                        value=""
                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    />
                                    <label
                                        for="rating-checkbox-4"
                                        class="ms-2 inline-flex items-center gap-1.5 text-sm font-medium text-gray-500 dark:text-gray-400"
                                    >
                                        <div class="flex items-center gap-0.5">
                                            <svg
                                                class="h-5 w-5 text-yellow-400"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"
                                                />
                                            </svg>
                                            <svg
                                                class="h-5 w-5 text-yellow-400"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"
                                                />
                                            </svg>
                                            <svg
                                                class="h-5 w-5 text-gray-300 dark:text-gray-600"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"
                                                />
                                            </svg>
                                            <svg
                                                class="h-5 w-5 text-gray-300 dark:text-gray-600"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"
                                                />
                                            </svg>
                                            <svg
                                                class="h-5 w-5 text-gray-300 dark:text-gray-600"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"
                                                />
                                            </svg>
                                        </div>
                                        (11)
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input
                                        id="rating-checkbox-5"
                                        type="checkbox"
                                        value=""
                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    />
                                    <label
                                        for="rating-checkbox-5"
                                        class="ms-2 inline-flex items-center gap-1.5 text-sm font-medium text-gray-500 dark:text-gray-400"
                                    >
                                        <div class="flex items-center gap-0.5">
                                            <svg
                                                class="h-5 w-5 text-yellow-400"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"
                                                />
                                            </svg>
                                            <svg
                                                class="h-5 w-5 text-gray-300 dark:text-gray-600"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"
                                                />
                                            </svg>
                                            <svg
                                                class="h-5 w-5 text-gray-300 dark:text-gray-600"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"
                                                />
                                            </svg>
                                            <svg
                                                class="h-5 w-5 text-gray-300 dark:text-gray-600"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"
                                                />
                                            </svg>
                                            <svg
                                                class="h-5 w-5 text-gray-300 dark:text-gray-600"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"
                                                />
                                            </svg>
                                        </div>
                                        (6)
                                    </label>
                                </div>
                            </div>

                            <a
                                href="#"
                                title=""
                                class="inline-flex items-center gap-1 text-sm font-medium text-blue-700 hover:underline dark:text-blue-500"
                            >
                                View all
                                <svg
                                    class="h-5 w-5"
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
                                        d="M19 12H5m14 0-4 4m4-4-4-4"
                                    />
                                </svg>
                            </a>
                        </div>
                        <h2 id="accordion-flush-heading-3">
                            <button
                                type="button"
                                class="mb-4 flex w-full items-center justify-between font-medium text-gray-500 hover:text-gray-900 rtl:text-right dark:!bg-gray-800 dark:text-gray-400 dark:hover:text-white"
                                data-accordion-target="#accordion-flush-body-3"
                                aria-expanded="false"
                                aria-controls="accordion-flush-body-3"
                            >
                                <span>Age</span>
                                <svg
                                    data-accordion-icon
                                    class="h-5 w-5 shrink-0 rotate-180"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m5 15 7-7 7 7"
                                    />
                                </svg>
                            </button>
                        </h2>
                        <div
                            id="accordion-flush-body-3"
                            class="mb-4 hidden space-y-4"
                            aria-labelledby="accordion-flush-heading-3"
                        >
                            <div class="space-y-3">
                                <a
                                    href="#"
                                    title=""
                                    class="inline-flex items-center gap-1 text-sm font-medium text-blue-700 hover:underline dark:text-blue-500"
                                >
                                    <svg
                                        class="h-4 w-4"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="m15 19-7-7 7-7"
                                        />
                                    </svg>
                                    Any Age
                                </a>
                                <div class="space-y-3">
                                    <div class="flex items-center">
                                        <input
                                            id="price-range-1"
                                            type="checkbox"
                                            value=""
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                        />
                                        <label
                                            for="price-range-1"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >
                                            Under $10
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input
                                            id="price-range-2"
                                            type="checkbox"
                                            value=""
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                            checked
                                        />
                                        <label
                                            for="price-range-2"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >
                                            $10 to $20
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input
                                            id="price-range-3"
                                            type="checkbox"
                                            value=""
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                        />
                                        <label
                                            for="price-range-3"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >
                                            $20 to $30
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input
                                            id="price-range-4"
                                            type="checkbox"
                                            value=""
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                        />
                                        <label
                                            for="price-range-4"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >
                                            $30 to $40
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input
                                            id="price-range-5"
                                            type="checkbox"
                                            value=""
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                            checked
                                        />
                                        <label
                                            for="price-range-5"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >
                                            $40 to $50
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input
                                            id="price-range-6"
                                            type="checkbox"
                                            value=""
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                        />
                                        <label
                                            for="price-range-6"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >
                                            $50 to $60
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input
                                            id="price-range-7"
                                            type="checkbox"
                                            value=""
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                            checked
                                        />
                                        <label
                                            for="price-range-7"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >
                                            $60 to $70
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input
                                            id="price-range-8"
                                            type="checkbox"
                                            value=""
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                        />
                                        <label
                                            for="price-range-8"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >
                                            $70 to $80
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input
                                            id="price-range-9"
                                            type="checkbox"
                                            value=""
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                        />
                                        <label
                                            for="price-range-9"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >
                                            $80 to $90
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input
                                            id="price-range-10"
                                            type="checkbox"
                                            value=""
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                        />
                                        <label
                                            for="price-range-10"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >
                                            Over $100
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label
                                        for="from_amount"
                                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                    >
                                        From
                                    </label>
                                    <input
                                        type="text"
                                        id="from_amount"
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                        placeholder="18"
                                        required
                                    />
                                </div>

                                <div>
                                    <label
                                        for="to_amount"
                                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                    >
                                        To
                                    </label>
                                    <input
                                        type="text"
                                        id="to_amount"
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                        placeholder="99"
                                        required
                                    />
                                </div>
                            </div>
                        </div>
                        <h2 id="accordion-flush-heading-4">
                            <button
                                type="button"
                                class="mb-4 flex w-full items-center justify-between font-medium text-gray-500 hover:text-gray-900 rtl:text-right dark:!bg-gray-800 dark:text-gray-400 dark:hover:text-white"
                                data-accordion-target="#accordion-flush-body-4"
                                aria-expanded="false"
                                aria-controls="accordion-flush-body-4"
                            >
                                <span>Shipping to</span>
                                <svg
                                    data-accordion-icon
                                    class="h-5 w-5 shrink-0 rotate-180"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m5 15 7-7 7 7"
                                    />
                                </svg>
                            </button>
                        </h2>
                        <div
                            id="accordion-flush-body-4"
                            class="mb-4 hidden space-y-4"
                            aria-labelledby="accordion-flush-heading-4"
                        >
                            <div class="space-y-3">
                                <label for="asia" class="relative block">
                                    <input
                                        type="checkbox"
                                        name="asia"
                                        id="asia"
                                        class="peer absolute top-2 left-2 appearance-none"
                                    />
                                    <div
                                        class="relative cursor-pointer space-y-1 overflow-hidden rounded-lg border border-gray-200 bg-white p-4 text-gray-500 peer-checked:border-blue-700 peer-checked:bg-blue-50 peer-checked:text-blue-700 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:peer-checked:border-blue-600 dark:peer-checked:bg-blue-900 dark:peer-checked:text-blue-300"
                                    >
                                        <p class="text-sm font-medium">Asia</p>
                                        <p class="text-sm font-normal">
                                            Delivery for Asia for
                                            <span class="font-medium">$954</span>
                                        </p>
                                    </div>
                                </label>

                                <label for="africa" class="relative block">
                                    <input
                                        type="checkbox"
                                        name="africa"
                                        id="africa"
                                        class="peer absolute top-2 left-2 appearance-none"
                                    />
                                    <div
                                        class="relative cursor-pointer space-y-1 overflow-hidden rounded-lg border border-gray-200 bg-white p-4 text-gray-500 peer-checked:border-blue-700 peer-checked:bg-blue-50 peer-checked:text-blue-700 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:peer-checked:border-blue-600 dark:peer-checked:bg-blue-900 dark:peer-checked:text-blue-300"
                                    >
                                        <p class="text-sm font-medium">Africa</p>
                                        <p class="text-sm font-normal">
                                            Delivery for Africa for
                                            <span class="font-medium">
                                            $706,834
                                        </span>
                                        </p>
                                    </div>
                                </label>

                                <label for="americas" class="relative block">
                                    <input
                                        type="checkbox"
                                        name="americas"
                                        id="americas"
                                        class="peer absolute top-2 left-2 appearance-none"
                                        checked
                                    />
                                    <div
                                        class="relative cursor-pointer space-y-1 overflow-hidden rounded-lg border border-gray-200 bg-white p-4 text-gray-500 peer-checked:border-blue-700 peer-checked:bg-blue-50 peer-checked:text-blue-700 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:peer-checked:border-blue-600 dark:peer-checked:bg-blue-900 dark:peer-checked:text-blue-300"
                                    >
                                        <p class="text-sm font-medium">Americas</p>
                                        <p class="text-sm font-normal">
                                            Delivery for USA for
                                            <span class="font-medium">$365,35</span>
                                        </p>
                                    </div>
                                </label>

                                <label for="australia" class="relative block">
                                    <input
                                        type="checkbox"
                                        name="australia"
                                        id="australia"
                                        class="peer absolute top-2 left-2 appearance-none"
                                        checked
                                    />
                                    <div
                                        class="relative cursor-pointer space-y-1 overflow-hidden rounded-lg border border-gray-200 bg-white p-4 text-gray-500 peer-checked:border-blue-700 peer-checked:bg-blue-50 peer-checked:text-blue-700 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:peer-checked:border-blue-600 dark:peer-checked:bg-blue-900 dark:peer-checked:text-blue-300"
                                    >
                                        <p class="text-sm font-medium">
                                            Australia/Oceania
                                        </p>
                                        <p class="text-sm font-normal">
                                            Delivery for Australia for
                                            <span class="font-medium">$209,98</span>
                                        </p>
                                    </div>
                                </label>

                                <label for="europe" class="relative block">
                                    <input
                                        type="checkbox"
                                        name="europe"
                                        id="europe"
                                        class="peer absolute top-2 left-2 appearance-none"
                                    />
                                    <div
                                        class="relative cursor-pointer space-y-1 overflow-hidden rounded-lg border border-gray-200 bg-white p-4 text-gray-500 peer-checked:border-blue-700 peer-checked:bg-blue-50 peer-checked:text-blue-700 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:peer-checked:border-blue-600 dark:peer-checked:bg-blue-900 dark:peer-checked:text-blue-300"
                                    >
                                        <p class="text-sm font-medium">Europe</p>
                                        <p class="text-sm font-normal">
                                            Delivery for Europe for
                                            <span class="font-medium">
                                            $1,365,35
                                        </span>
                                        </p>
                                    </div>
                                </label>

                                <label for="antarctica" class="relative block">
                                    <input
                                        type="checkbox"
                                        name="antarctica"
                                        id="antarctica"
                                        class="peer absolute top-2 left-2 appearance-none"
                                    />
                                    <div
                                        class="relative cursor-pointer space-y-1 overflow-hidden rounded-lg border border-gray-200 bg-white p-4 text-gray-500 peer-checked:border-blue-700 peer-checked:bg-blue-50 peer-checked:text-blue-700 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:peer-checked:border-blue-600 dark:peer-checked:bg-blue-900 dark:peer-checked:text-blue-300"
                                    >
                                        <p class="text-sm font-medium">
                                            Antarctica
                                        </p>
                                        <p class="text-sm font-normal">N/A</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <h2 id="accordion-flush-heading-5">
                            <button
                                type="button"
                                class="mb-4 flex w-full items-center justify-between font-medium text-gray-500 hover:text-gray-900 rtl:text-right dark:!bg-gray-800 dark:text-gray-400 dark:hover:text-white"
                                data-accordion-target="#accordion-flush-body-5"
                                aria-expanded="false"
                                aria-controls="accordion-flush-body-5"
                            >
                                <span>Color</span>
                                <svg
                                    data-accordion-icon
                                    class="h-5 w-5 shrink-0 rotate-180"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m5 15 7-7 7 7"
                                    />
                                </svg>
                            </button>
                        </h2>
                        <div
                            id="accordion-flush-body-5"
                            class="mb-4 hidden space-y-4"
                            aria-labelledby="accordion-flush-heading-5"
                        >
                            <div>
                                <label class="sr-only">Color</label>

                                <div class="mt-2 flex items-center gap-2">
                                    <label
                                        class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 ring-gray-900 focus:outline-none has-[:checked]:ring-2"
                                    >
                                        <input
                                            type="radio"
                                            name="color-choice"
                                            value="Black"
                                            class="sr-only"
                                            checked
                                        />
                                        <span
                                            id="color-choice-0-label"
                                            class="sr-only"
                                        >
                                        Black
                                    </span>
                                        <span
                                            aria-hidden="true"
                                            class="border-opacity-10 h-7 w-7 rounded-full border border-gray-900 bg-gray-900"
                                        ></span>
                                    </label>

                                    <label
                                        class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 ring-blue-700 focus:outline-none has-[:checked]:ring-2"
                                    >
                                        <input
                                            type="radio"
                                            name="color-choice"
                                            value="Blue"
                                            class="sr-only"
                                        />
                                        <span
                                            id="color-choice-0-label"
                                            class="sr-only"
                                        >
                                        Blue
                                    </span>
                                        <span
                                            aria-hidden="true"
                                            class="border-opacity-10 h-7 w-7 rounded-full border border-blue-700 bg-blue-700"
                                        ></span>
                                    </label>

                                    <label
                                        class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 ring-pink-600 focus:outline-none has-[:checked]:ring-2"
                                    >
                                        <input
                                            type="radio"
                                            name="color-choice"
                                            value="Pink"
                                            class="sr-only"
                                        />
                                        <span
                                            id="color-choice-0-label"
                                            class="sr-only"
                                        >
                                        Pink
                                    </span>
                                        <span
                                            aria-hidden="true"
                                            class="border-opacity-10 h-7 w-7 rounded-full border border-pink-600 bg-pink-600"
                                        ></span>
                                    </label>

                                    <label
                                        class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 ring-teal-600 focus:outline-none has-[:checked]:ring-2"
                                    >
                                        <input
                                            type="radio"
                                            name="color-choice"
                                            value="Teal"
                                            class="sr-only"
                                        />
                                        <span
                                            id="color-choice-0-label"
                                            class="sr-only"
                                        >
                                        Teal
                                    </span>
                                        <span
                                            aria-hidden="true"
                                            class="border-opacity-10 h-7 w-7 rounded-full border border-teal-600 bg-teal-600"
                                        ></span>
                                    </label>

                                    <label
                                        class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 ring-purple-600 focus:outline-none has-[:checked]:ring-2"
                                    >
                                        <input
                                            type="radio"
                                            name="color-choice"
                                            value="Purple"
                                            class="sr-only"
                                        />
                                        <span
                                            id="color-choice-0-label"
                                            class="sr-only"
                                        >
                                        Purple
                                    </span>
                                        <span
                                            aria-hidden="true"
                                            class="border-opacity-10 h-7 w-7 rounded-full border border-purple-600 bg-purple-600"
                                        ></span>
                                    </label>

                                    <label
                                        class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 ring-yellow-400 focus:outline-none has-[:checked]:ring-2"
                                    >
                                        <input
                                            type="radio"
                                            name="color-choice"
                                            value="Yellow"
                                            class="sr-only"
                                        />
                                        <span
                                            id="color-choice-0-label"
                                            class="sr-only"
                                        >
                                        Yellow
                                    </span>
                                        <span
                                            aria-hidden="true"
                                            class="border-opacity-10 h-7 w-7 rounded-full border border-yellow-400 bg-yellow-400"
                                        ></span>
                                    </label>

                                    <label
                                        class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 ring-green-600 focus:outline-none has-[:checked]:ring-2"
                                    >
                                        <input
                                            type="radio"
                                            name="color-choice"
                                            value="Green"
                                            class="sr-only"
                                        />
                                        <span
                                            id="color-choice-0-label"
                                            class="sr-only"
                                        >
                                        Green
                                    </span>
                                        <span
                                            aria-hidden="true"
                                            class="border-opacity-10 h-7 w-7 rounded-full border border-green-600 bg-green-600"
                                        ></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <h2 id="accordion-flush-heading-6">
                            <button
                                type="button"
                                class="mb-4 flex w-full items-center justify-between font-medium text-gray-500 hover:text-gray-900 rtl:text-right dark:!bg-gray-800 dark:text-gray-400 dark:hover:text-white"
                                data-accordion-target="#accordion-flush-body-6"
                                aria-expanded="false"
                                aria-controls="accordion-flush-body-6"
                            >
                                <span>Delivery Method</span>
                                <svg
                                    data-accordion-icon
                                    class="h-5 w-5 shrink-0 rotate-180"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m5 15 7-7 7 7"
                                    />
                                </svg>
                            </button>
                        </h2>
                        <div
                            id="accordion-flush-body-6"
                            class="mb-4 hidden space-y-4"
                            aria-labelledby="accordion-flush-heading-6"
                        >
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <input
                                        id="flowbox"
                                        type="radio"
                                        name="delivery"
                                        value=""
                                        class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    />
                                    <label
                                        for="flowbox"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >
                                        Flowbox
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input
                                        id="pick-from-store"
                                        type="radio"
                                        name="delivery"
                                        value=""
                                        class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    />
                                    <label
                                        for="pick-from-store"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >
                                        Pick up from the store
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input
                                        id="courier"
                                        type="radio"
                                        name="delivery"
                                        value=""
                                        class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    />
                                    <label
                                        for="courier"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >
                                        Fast courier
                                    </label>
                                </div>
                            </div>
                        </div>
                        <h2 id="accordion-flush-heading-7">
                            <button
                                type="button"
                                class="mb-4 flex w-full items-center justify-between font-medium text-gray-500 hover:text-gray-900 rtl:text-right dark:!bg-gray-800 dark:text-gray-400 dark:hover:text-white"
                                data-accordion-target="#accordion-flush-body-7"
                                aria-expanded="false"
                                aria-controls="accordion-flush-body-7"
                            >
                                <span>Condition</span>
                                <svg
                                    data-accordion-icon
                                    class="h-5 w-5 shrink-0 rotate-180"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m5 15 7-7 7 7"
                                    />
                                </svg>
                            </button>
                        </h2>
                        <div
                            id="accordion-flush-body-7"
                            class="mb-4 hidden space-y-4"
                            aria-labelledby="accordion-flush-heading-7"
                        >
                            <div class="flex items-center">
                                <input
                                    id="new"
                                    type="radio"
                                    name="condition"
                                    value=""
                                    class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                />
                                <label
                                    for="new"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                >
                                    New Product
                                </label>
                            </div>

                            <div class="flex items-center">
                                <input
                                    id="used"
                                    type="radio"
                                    name="condition"
                                    value=""
                                    class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                />
                                <label
                                    for="used"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                >
                                    Used Prooduct
                                </label>
                            </div>

                            <div class="flex items-center">
                                <input
                                    id="resealed"
                                    type="radio"
                                    name="condition"
                                    value=""
                                    class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                />
                                <label
                                    for="resealed"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                >
                                    Resealed
                                </label>
                            </div>
                        </div>
                        <h2 id="accordion-flush-heading-8">
                            <button
                                type="button"
                                class="flex w-full items-center justify-between font-medium text-gray-500 hover:text-gray-900 rtl:text-right dark:!bg-gray-800 dark:text-gray-400 dark:hover:text-white"
                                data-accordion-target="#accordion-flush-body-8"
                                aria-expanded="false"
                                aria-controls="accordion-flush-body-8"
                            >
                                <span>Weight</span>
                                <svg
                                    data-accordion-icon
                                    class="h-5 w-5 shrink-0 rotate-180"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m5 15 7-7 7 7"
                                    />
                                </svg>
                            </button>
                        </h2>
                        <div
                            id="accordion-flush-body-8"
                            class="my-4 hidden space-y-4"
                            aria-labelledby="accordion-flush-heading-8"
                        >
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <input
                                        id="weight-1"
                                        type="checkbox"
                                        value=""
                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    />
                                    <label
                                        for="weight-1"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >
                                        Under 1 kg
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input
                                        id="weight-2"
                                        type="checkbox"
                                        value=""
                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                        checked
                                    />
                                    <label
                                        for="weight-2"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >
                                        1 kg to 5 kg
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input
                                        id="weight-3"
                                        type="checkbox"
                                        value=""
                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    />
                                    <label
                                        for="weight-3"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >
                                        5 kg to 10 kg
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input
                                        id="weight-4"
                                        type="checkbox"
                                        value=""
                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    />
                                    <label
                                        for="weight-4"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >
                                        10 kg to 20 kg
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input
                                        id="weight-5"
                                        type="checkbox"
                                        value=""
                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    />
                                    <label
                                        for="weight-5"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >
                                        Over 20 kg
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <!-- Right content -->
                <div class="w-full">
                    <!-- Product Cards -->
                    <div class="mb-6 grid gap-4 sm:grid-cols-2">
                        @foreach ($results as $result)
                            <div
                                class="rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800"
                            >
                                <div class="relative">
                                    <div class="h-64 p-6">
                                        <a
                                            href="{{ route('browser.show', ['profile' => $result->ulid]) }}"
                                            wire:navigate.hover
                                        >
                                            <img
                                                class="h-auto max-h-full w-full dark:hidden"
                                                src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/apple-watch-light.svg"
                                                alt="watch image"
                                            />
                                            <img
                                                class="hidden h-auto max-h-full w-full dark:block"
                                                src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/apple-watch-dark.svg"
                                                alt="watch image"
                                            />
                                        </a>
                                    </div>

                                    <div class="absolute top-0 right-0 p-1.5">
                                        <button
                                            type="button"
                                            data-tooltip-target="tooltip-add-to-favorites-9"
                                            class="rounded p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                        >
                                        <span class="sr-only">
                                            Add to Favorites
                                        </span>
                                            <svg
                                                class="h-6 w-6"
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
                                                    d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z"
                                                />
                                            </svg>
                                        </button>

                                        <div
                                            id="tooltip-add-to-favorites-9"
                                            role="tooltip"
                                            class="tooltip invisible absolute z-10 inline-block w-[132px] rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-600"
                                            data-popper-placement="top"
                                        >
                                            Add to favorites
                                            <div
                                                class="tooltip-arrow"
                                                data-popper-arrow=""
                                            ></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-y-6 p-6">
                                    <div
                                        class="flex items-center justify-between space-x-4"
                                    >
                                        <a
                                            href="{{ route('browser.show', ['profile' => $result->ulid]) }}"
                                            wire:navigate.hover
                                            class="text-lg leading-tight font-semibold text-gray-900 hover:underline dark:text-white"
                                        >
                                            {{ $result->first_name }}
                                            {{ $result->last_name[0] }}.
                                        </a>

                                        <p
                                            class="text-2xl leading-tight font-extrabold text-gray-900 dark:text-white"
                                        >
                                            {{ $result->age }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Pagination -->
                </div>
            </div>

            <!-- Mobile Drawer -->
            <form
                action="#"
                method="get"
                id="drawer-mobile-filter"
                class="fixed top-0 left-0 z-40 h-screen w-full max-w-sm -translate-x-full overflow-y-auto bg-white p-4 transition-transform dark:bg-gray-800"
                tabindex="-1"
                aria-labelledby="drawer-label"
            >
                <h5
                    id="drawer-label-2"
                    class="mb-4 inline-flex items-center text-base font-semibold text-gray-500 uppercase dark:text-gray-400"
                >
                    Filters mobile
                </h5>
                <button
                    type="button"
                    data-drawer-dismiss="drawer-mobile-filter"
                    aria-controls="drawer-mobile-filter"
                    class="absolute top-2.5 right-2.5 inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                >
                    <svg
                        class="h-5 w-5"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18 17.94 6M18 18 6.06 6"
                        />
                    </svg>
                    <span class="sr-only">Close menu</span>
                </button>

                <div class="flex flex-1 flex-col justify-between">
                    <div class="space-y-4">
                        <!-- Product Brand -->
                        <div>
                            <label
                                for="product-brand-2"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                            >
                                Product Brand
                            </label>
                            <select
                                id="product-brand-2"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            >
                                <option selected value="apple">Apple</option>
                                <option value="lg">LG</option>
                                <option value="samsung">Samsung</option>
                                <option value="logitech">Logitech</option>
                                <option value="lenovo">Lenovo</option>
                                <option value="samsung">Philips</option>
                                <option value="logitech">Microsoft</option>
                                <option value="lenovo">Sony</option>
                            </select>
                        </div>

                        <!-- Price -->
                        <div>
                            <h6
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                            >
                                Price Range
                            </h6>
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <input
                                        id="min-price"
                                        type="range"
                                        min="0"
                                        max="7000"
                                        value="300"
                                        step="1"
                                        class="h-2 w-full cursor-pointer appearance-none rounded-lg bg-gray-200 dark:bg-gray-700"
                                    />
                                </div>

                                <div>
                                    <input
                                        id="max-price"
                                        type="range"
                                        min="0"
                                        max="7000"
                                        value="3500"
                                        step="1"
                                        class="h-2 w-full cursor-pointer appearance-none rounded-lg bg-gray-200 dark:bg-gray-700"
                                    />
                                </div>

                                <div
                                    class="col-span-2 flex items-center justify-between space-x-4"
                                >
                                    <div class="w-full">
                                        <label
                                            for="min-price-input"
                                            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                        >
                                            From
                                        </label>
                                        <input
                                            type="number"
                                            id="min-price-input"
                                            value="300"
                                            min="0"
                                            max="7000"
                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                            placeholder=""
                                            required
                                        />
                                    </div>

                                    <div class="w-full">
                                        <label
                                            for="max-price-input"
                                            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                        >
                                            To
                                        </label>
                                        <input
                                            type="number"
                                            id="max-price-input"
                                            value="3500"
                                            min="0"
                                            max="7000"
                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                            placeholder=""
                                            required
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <!-- Delivery method -->
                            <div class="w-full space-y-3">
                                <h6
                                    class="mb-2 text-sm font-medium text-black dark:text-white"
                                >
                                    Delivery method
                                </h6>
                                <div class="flex items-center">
                                    <input
                                        id="flowbox-2"
                                        type="radio"
                                        name="delivery"
                                        value=""
                                        class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    />
                                    <label
                                        for="flowbox-2"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >
                                        Flowbox
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input
                                        id="pick-from-store-2"
                                        type="radio"
                                        name="delivery"
                                        value=""
                                        class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    />
                                    <label
                                        for="pick-from-store-2"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >
                                        Pick from the store
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input
                                        id="courier-2"
                                        type="radio"
                                        name="delivery"
                                        value=""
                                        class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    />
                                    <label
                                        for="courier-2"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >
                                        Fast courier
                                    </label>
                                </div>
                            </div>
                            <div class="w-full">
                                <h6
                                    class="mb-2 text-sm font-medium text-black dark:text-white"
                                >
                                    Rating
                                </h6>
                                <div class="space-y-2">
                                    <div class="flex items-center">
                                        <input
                                            id="five-stars"
                                            type="radio"
                                            value=""
                                            name="rating"
                                            class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                        />
                                        <label
                                            for="five-stars"
                                            class="ml-2 flex items-center"
                                        >
                                            <svg
                                                aria-hidden="true"
                                                class="h-5 w-5 text-yellow-400"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <title>First star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                                ></path>
                                            </svg>
                                            <svg
                                                aria-hidden="true"
                                                class="h-5 w-5 text-yellow-400"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <title>Second star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                                ></path>
                                            </svg>
                                            <svg
                                                aria-hidden="true"
                                                class="h-5 w-5 text-yellow-400"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <title>Third star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                                ></path>
                                            </svg>
                                            <svg
                                                aria-hidden="true"
                                                class="h-5 w-5 text-yellow-400"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <title>Fourth star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                                ></path>
                                            </svg>
                                            <svg
                                                aria-hidden="true"
                                                class="h-5 w-5 text-yellow-400"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <title>Fifth star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                                ></path>
                                            </svg>
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input
                                            id="four-stars"
                                            type="radio"
                                            value=""
                                            name="rating"
                                            class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                        />
                                        <label
                                            for="four-stars"
                                            class="ml-2 flex items-center"
                                        >
                                            <svg
                                                aria-hidden="true"
                                                class="h-5 w-5 text-yellow-400"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <title>First star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                                ></path>
                                            </svg>
                                            <svg
                                                aria-hidden="true"
                                                class="h-5 w-5 text-yellow-400"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <title>Second star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                                ></path>
                                            </svg>
                                            <svg
                                                aria-hidden="true"
                                                class="h-5 w-5 text-yellow-400"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <title>Third star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                                ></path>
                                            </svg>
                                            <svg
                                                aria-hidden="true"
                                                class="h-5 w-5 text-yellow-400"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <title>Fourth star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                                ></path>
                                            </svg>
                                            <svg
                                                aria-hidden="true"
                                                class="h-5 w-5 text-gray-300 dark:text-gray-500"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <title>Fifth star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                                ></path>
                                            </svg>
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input
                                            id="three-stars"
                                            type="radio"
                                            value=""
                                            name="rating"
                                            checked
                                            class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                        />
                                        <label
                                            for="three-stars"
                                            class="ml-2 flex items-center"
                                        >
                                            <svg
                                                aria-hidden="true"
                                                class="h-5 w-5 text-yellow-400"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <title>First star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                                ></path>
                                            </svg>
                                            <svg
                                                aria-hidden="true"
                                                class="h-5 w-5 text-yellow-400"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <title>Second star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                                ></path>
                                            </svg>
                                            <svg
                                                aria-hidden="true"
                                                class="h-5 w-5 text-yellow-400"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <title>Third star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                                ></path>
                                            </svg>
                                            <svg
                                                aria-hidden="true"
                                                class="h-5 w-5 text-gray-300 dark:text-gray-500"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <title>Fourth star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                                ></path>
                                            </svg>
                                            <svg
                                                aria-hidden="true"
                                                class="h-5 w-5 text-gray-300 dark:text-gray-500"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <title>Fifth star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                                ></path>
                                            </svg>
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input
                                            id="two-stars"
                                            type="radio"
                                            value=""
                                            name="rating"
                                            class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                        />
                                        <label
                                            for="two-stars"
                                            class="ml-2 flex items-center"
                                        >
                                            <svg
                                                aria-hidden="true"
                                                class="h-5 w-5 text-yellow-400"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <title>First star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                                ></path>
                                            </svg>
                                            <svg
                                                aria-hidden="true"
                                                class="h-5 w-5 text-yellow-400"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <title>Second star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                                ></path>
                                            </svg>
                                            <svg
                                                aria-hidden="true"
                                                class="h-5 w-5 text-gray-300 dark:text-gray-500"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <title>Third star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                                ></path>
                                            </svg>
                                            <svg
                                                aria-hidden="true"
                                                class="h-5 w-5 text-gray-300 dark:text-gray-500"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <title>Fourth star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                                ></path>
                                            </svg>
                                            <svg
                                                aria-hidden="true"
                                                class="h-5 w-5 text-gray-300 dark:text-gray-500"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <title>Fifth star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                                ></path>
                                            </svg>
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input
                                            id="one-star"
                                            type="radio"
                                            value=""
                                            name="rating"
                                            class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                        />
                                        <label
                                            for="one-star"
                                            class="ml-2 flex items-center"
                                        >
                                            <svg
                                                aria-hidden="true"
                                                class="h-5 w-5 text-yellow-400"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <title>First star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                                ></path>
                                            </svg>
                                            <svg
                                                aria-hidden="true"
                                                class="h-5 w-5 text-gray-300 dark:text-gray-500"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <title>Second star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                                ></path>
                                            </svg>
                                            <svg
                                                aria-hidden="true"
                                                class="h-5 w-5 text-gray-300 dark:text-gray-500"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <title>Third star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                                ></path>
                                            </svg>
                                            <svg
                                                aria-hidden="true"
                                                class="h-5 w-5 text-gray-300 dark:text-gray-500"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <title>Fourth star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                                ></path>
                                            </svg>
                                            <svg
                                                aria-hidden="true"
                                                class="h-5 w-5 text-gray-300 dark:text-gray-500"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <title>Fifth star</title>
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                                ></path>
                                            </svg>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Condition -->
                        <div>
                            <h6
                                class="mb-2 text-sm font-medium text-black dark:text-white"
                            >
                                Condition
                            </h6>

                            <ul
                                class="flex w-full items-center rounded-lg border border-gray-200 bg-white text-sm font-medium text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                            >
                                <li
                                    class="w-full border-r border-gray-200 dark:border-gray-600"
                                >
                                    <div class="flex items-center pl-3">
                                        <input
                                            id="condition-all"
                                            type="radio"
                                            value=""
                                            name="list-radio"
                                            checked
                                            class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-blue-600"
                                        />
                                        <label
                                            for="condition-all"
                                            class="ml-2 w-full py-3 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >
                                            All
                                        </label>
                                    </div>
                                </li>
                                <li
                                    class="w-full border-r border-gray-200 dark:border-gray-600"
                                >
                                    <div class="flex items-center pl-3">
                                        <input
                                            id="condition-new"
                                            type="radio"
                                            value=""
                                            name="list-radio"
                                            class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-blue-600"
                                        />
                                        <label
                                            for="condition-new"
                                            class="ml-2 w-full py-3 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >
                                            New
                                        </label>
                                    </div>
                                </li>
                                <li class="w-full">
                                    <div class="flex items-center pl-3">
                                        <input
                                            id="condition-used"
                                            type="radio"
                                            value=""
                                            name="list-radio"
                                            class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-blue-600"
                                        />
                                        <label
                                            for="condition-used"
                                            class="ml-2 w-full py-3 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >
                                            Used
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- Color & Rating -->
                        <div class="grid grid-cols-2 gap-4">
                            <div class="w-full">
                                <h6
                                    class="mb-2 text-sm font-medium text-black dark:text-white"
                                >
                                    Colour
                                </h6>
                                <div class="space-y-2">
                                    <div class="flex items-center">
                                        <input
                                            id="blue"
                                            type="checkbox"
                                            value=""
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                        />

                                        <label
                                            for="blue"
                                            class="ml-2 flex items-center text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >
                                            <div
                                                class="mr-2 h-3.5 w-3.5 rounded-full bg-blue-600"
                                            ></div>
                                            Blue
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input
                                            id="gray"
                                            type="checkbox"
                                            value=""
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                        />

                                        <label
                                            for="gray"
                                            class="ml-2 flex items-center text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >
                                            <div
                                                class="mr-2 h-3.5 w-3.5 rounded-full bg-gray-400"
                                            ></div>
                                            Gray
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input
                                            id="green"
                                            type="checkbox"
                                            value=""
                                            checked
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                        />

                                        <label
                                            for="green"
                                            class="ml-2 flex items-center text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >
                                            <div
                                                class="mr-2 h-3.5 w-3.5 rounded-full bg-green-400"
                                            ></div>
                                            Green
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input
                                            id="pink"
                                            type="checkbox"
                                            value=""
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                        />

                                        <label
                                            for="pink"
                                            class="ml-2 flex items-center text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >
                                            <div
                                                class="mr-2 h-3.5 w-3.5 rounded-full bg-pink-400"
                                            ></div>
                                            Pink
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input
                                            id="red"
                                            type="checkbox"
                                            value=""
                                            checked
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                        />

                                        <label
                                            for="red"
                                            class="ml-2 flex items-center text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >
                                            <div
                                                class="mr-2 h-3.5 w-3.5 rounded-full bg-red-500"
                                            ></div>
                                            Red
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full space-y-3">
                                <h6
                                    class="mb-2 text-sm font-medium text-black dark:text-white"
                                >
                                    Weight
                                </h6>
                                <div class="flex items-center">
                                    <input
                                        id="weight-6"
                                        type="checkbox"
                                        value=""
                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    />
                                    <label
                                        for="weight-6"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >
                                        Under 1 kg
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input
                                        id="weight-7"
                                        type="checkbox"
                                        value=""
                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                        checked
                                    />
                                    <label
                                        for="weight-7"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >
                                        1 kg to 5 kg
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input
                                        id="weight-8"
                                        type="checkbox"
                                        value=""
                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    />
                                    <label
                                        for="weight-8"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >
                                        5 kg to 10 kg
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input
                                        id="weight-9"
                                        type="checkbox"
                                        value=""
                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    />
                                    <label
                                        for="weight-9"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >
                                        10 kg to 20 kg
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input
                                        id="weight-10"
                                        type="checkbox"
                                        value=""
                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                    />
                                    <label
                                        for="weight-10"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >
                                        Over 20 kg
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Delivery -->
                        <div>
                            <h6
                                class="mb-2 text-sm font-medium text-black dark:text-white"
                            >
                                Shipping to
                            </h6>

                            <ul class="grid gap-4 sm:grid-cols-2">
                                <li>
                                    <input
                                        type="radio"
                                        id="delivery-usa"
                                        name="delivery"
                                        value="delivery-usa"
                                        class="peer hidden"
                                        checked
                                    />
                                    <label
                                        for="delivery-usa"
                                        class="inline-flex w-full cursor-pointer items-center justify-between rounded-lg border border-gray-200 bg-white p-5 text-gray-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:bg-gray-100 hover:text-gray-600 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:peer-checked:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                    >
                                        <div class="block">
                                            <div
                                                class="w-full text-base font-semibold"
                                            >
                                                USA
                                            </div>
                                            <div class="w-full text-sm">
                                                Delivery only for USA
                                            </div>
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <input
                                        type="radio"
                                        id="delivery-europe"
                                        name="delivery"
                                        value="delivery-europe"
                                        class="peer hidden"
                                    />
                                    <label
                                        for="delivery-europe"
                                        class="inline-flex w-full cursor-pointer items-center justify-between rounded-lg border border-gray-200 bg-white p-5 text-gray-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:bg-gray-100 hover:text-gray-600 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:peer-checked:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                    >
                                        <div class="block">
                                            <div
                                                class="w-full text-base font-semibold"
                                            >
                                                Europe
                                            </div>
                                            <div class="w-full text-sm">
                                                Delivery only for USA
                                            </div>
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <input
                                        type="radio"
                                        id="delivery-asia"
                                        name="delivery"
                                        value="delivery-asia"
                                        class="peer hidden"
                                        checked
                                    />
                                    <label
                                        for="delivery-asia"
                                        class="inline-flex w-full cursor-pointer items-center justify-between rounded-lg border border-gray-200 bg-white p-5 text-gray-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:bg-gray-100 hover:text-gray-600 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:peer-checked:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                    >
                                        <div class="block">
                                            <div
                                                class="w-full text-base font-semibold"
                                            >
                                                Asia
                                            </div>
                                            <div class="w-full text-sm">
                                                Delivery only for Asia
                                            </div>
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <input
                                        type="radio"
                                        id="delivery-australia"
                                        name="delivery"
                                        value="delivery-australia"
                                        class="peer hidden"
                                    />
                                    <label
                                        for="delivery-australia"
                                        class="inline-flex w-full cursor-pointer items-center justify-between rounded-lg border border-gray-200 bg-white p-5 text-gray-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:bg-gray-100 hover:text-gray-600 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:peer-checked:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                    >
                                        <div class="block">
                                            <div
                                                class="w-full text-base font-semibold"
                                            >
                                                Australia
                                            </div>
                                            <div class="w-full text-sm">
                                                Delivery only for Australia
                                            </div>
                                        </div>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div
                        class="bottom-0 left-0 mt-6 flex w-full justify-center space-x-4 pb-4"
                    >
                        <button
                            type="submit"
                            class="w-full rounded-lg bg-blue-700 px-5 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:bg-blue-700 dark:hover:bg-blue-800 dark:focus:ring-blue-800"
                        >
                            Apply filters
                        </button>
                        <button
                            type="reset"
                            class="w-full rounded-lg border border-gray-200 bg-white px-5 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 focus:outline-none dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700"
                        >
                            Clear all
                        </button>
                    </div>
                </div>
            </form>

            {{ $results->links() }}

        </x-slot>
    </x-customtheme::page-layouts.page-with-image-banner>
</div>
