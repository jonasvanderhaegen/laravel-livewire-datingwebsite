<x-settings::page-layouts.settings>
    <div class="flex justify-between">
        <div class="mb-6 hidden lg:w-52 xl:block"></div>

        <article
            class="format format-sm sm:format-base lg:format-lg format-blue dark:format-invert mx-auto w-full max-w-2xl space-y-10"
        >
            <figure class="space-y-2">
                <img
                    src="https://pictures.match.com/photos/366/484/9ae68af9-1f38-f011-9b6a-6c92cf29d881.jpeg"
                    alt=""
                    class="w-full rounded-4xl"
                />
                <figcaption>Caption 1</figcaption>
            </figure>

            <figure class="space-y-2">
                <img
                    src="https://pictures.match.com/photos/366/484/1ef93e72-2338-f011-9b6a-6c92cf29d881.jpeg"
                    alt=""
                    class="w-full rounded-4xl"
                />
                <figcaption>Caption 2</figcaption>
            </figure>
        </article>
        <aside class="hidden lg:block lg:w-72" aria-labelledby="sidebar-label">
            <div class="sticky top-25">
                <h3 id="sidebar-label" class="sr-only">Sidebar</h3>

                <button
                    type="button"
                    class="mb-8 inline-flex w-full cursor-pointer items-center rounded-full bg-blue-700 px-6 py-8 font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                >
                    <svg
                        class="me-2 h-6 w-6 text-white"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M7.5 4.586A2 2 0 0 1 8.914 4h6.172a2 2 0 0 1 1.414.586L17.914 6H19a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h1.086L7.5 4.586ZM10 12a2 2 0 1 1 4 0 2 2 0 0 1-4 0Zm2-4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Z"
                            clip-rule="evenodd"
                        />
                    </svg>

                    Upload photo
                </button>

                <div
                    class="mb-6 rounded-4xl border border-gray-200 p-6 text-gray-500 dark:border-gray-700 dark:text-gray-400"
                >
                    <div class="mb-4 flex items-center justify-between">
                        <div class="mr-3 shrink-0">
                            <img
                                class="mt-1 h-18 w-18 rounded-full"
                                src="https://pictures.match.com/photos/366/484/9ae68af9-1f38-f011-9b6a-6c92cf29d881.jpeg"
                                alt="Jese Leos"
                            />
                        </div>

                        <button
                            class="mr-3 cursor-pointer rounded-full bg-red-500 px-3 py-2 text-white"
                            type="button"
                        >
                            <span class="text-sm">Delete</span>
                        </button>

                        <div
                            class="flex-shrink-0 cursor-pointer rounded-full bg-gray-100 p-2 dark:bg-blue-500"
                        >
                            <svg
                                class="h-6 w-6 text-gray-800 dark:text-white"
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
                                    d="M12 19V5m0 14-4-4m4 4 4-4"
                                />
                            </svg>
                        </div>
                    </div>
                    <p class="mb-4 text-sm text-gray-500 dark:text-gray-400">
                        Caption 1
                    </p>
                </div>

                <div
                    class="rounded-4xl border border-gray-200 bg-gray-50 p-6 font-medium text-gray-500 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400"
                >
                    <h4
                        class="mb-6 font-bold text-gray-900 uppercase dark:text-white"
                    >
                        Photo Rules
                    </h4>
                    <ul class="space-y-4 text-gray-500 dark:text-gray-400">
                        <li class="flex items-start justify-between">
                            <div class="mr-3 shrink-0">
                                <img
                                    class="mt-1 h-6 w-6 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-3.jpg"
                                    alt="Bonnie Green"
                                />
                            </div>
                            <div class="mr-3">
                                <span
                                    class="block font-medium text-gray-900 dark:text-white"
                                >
                                    Bonnie Green
                                </span>
                                <span class="text-sm font-normal">
                                    Web developer at Facebook
                                </span>
                            </div>
                            <div>
                                <button
                                    type="button"
                                    class="rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 focus:outline-none dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700"
                                >
                                    Follow
                                </button>
                            </div>
                        </li>
                        <li class="flex items-start justify-between">
                            <div class="mr-3 shrink-0">
                                <img
                                    class="mt-1 h-6 w-6 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                    alt="Jese Leos"
                                />
                            </div>
                            <div class="mr-3">
                                <span
                                    class="block font-medium text-gray-900 dark:text-white"
                                >
                                    Jese Leos
                                </span>
                                <span class="text-sm font-normal">
                                    Enginner at Alphabet Inc.
                                </span>
                            </div>
                            <div>
                                <button
                                    type="button"
                                    class="rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 focus:outline-none dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700"
                                >
                                    Follow
                                </button>
                            </div>
                        </li>
                        <li class="flex items-start justify-between">
                            <div class="mr-3 shrink-0">
                                <img
                                    class="mt-1 h-6 w-6 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                    alt="Paul Livingston"
                                />
                            </div>
                            <div class="mr-3">
                                <span
                                    class="block font-medium text-gray-900 dark:text-white"
                                >
                                    Paul Livingston
                                </span>
                                <span class="text-sm font-normal">
                                    Figma designer at Adobe Inc.
                                </span>
                            </div>
                            <div>
                                <button
                                    type="button"
                                    class="rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 focus:outline-none dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700"
                                >
                                    Follow
                                </button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
    </div>
</x-settings::page-layouts.settings>
