<nav class="bg-pink-50 antialiased dark:bg-gray-800">
    <div
        class="mx-auto w-full max-w-5xl px-5 py-3 xl:max-w-7xl 2xl:max-w-[90rem]"
    >
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-8">
                <ul class="flex items-center justify-start gap-6 md:gap-8">
                    <li>
                        <a
                            href="{{ route('protected.discover') }}"
                            wire:navigate
                            class="group relative z-0 inline-flex items-center overflow-hidden rounded-full bg-white px-5 py-3 text-xs transition duration-200 will-change-transform hover:scale-x-105 dark:bg-slate-800"
                            target="_blank"
                            aria-label="Discover"
                            title="Discover more"
                        >
                            <div
                                class="[container-type:inline-size] absolute inset-0 flex items-center"
                                aria-hidden="true"
                            >
                                <div
                                    class="absolute h-[100cqw] w-[100cqw] [animation:spin_2.5s_linear_infinite] bg-[conic-gradient(from_0_at_50%_50%,rgba(246,173,85,0.75)_0deg,transparent_60deg,transparent_300deg,rgba(246,173,85,0.75)_360deg)] transition duration-300"
                                ></div>
                            </div>

                            <div
                                class="absolute inset-0.5 rounded-full bg-pink-100 dark:bg-slate-950"
                                aria-hidden="true"
                            ></div>

                            <div
                                class="absolute bottom-0 left-1/2 h-1/3 w-4/5 -translate-x-1/2 rounded-full bg-orange-300 opacity-50 blur-md transition-all duration-500 dark:bg-fuchsia-300/30 dark:group-hover:h-2/3 dark:group-hover:opacity-100"
                                aria-hidden="true"
                            ></div>

                            <span
                                class="relative inline-flex items-center gap-1"
                            >
                                <x-customtheme::icons.heart
                                    class="-mt-px size-3.5 text-red-400"
                                    aria-hidden="true"
                                />
                                <span class="text-sm font-medium">
                                    Discover
                                </span>
                                <span class="sr-only">click to learn more</span>
                            </span>
                        </a>
                    </li>
                    {{--
                    <li>
                        <a
                            href="{{ route('browser.index') }}"
                            wire:navigate.hover
                        >
                            Browse
                        </a>
                    </li>
                    --}}
                    <!-- <li class="shrink-0">
                        <a href="#" title=""
                            class="flex text-sm font-medium text-gray-900 hover:text-blue-700 dark:text-white dark:hover:text-slate-50">
                            Help
                        </a>
                    </li> -->
                </ul>
            </div>

            <div class="flex items-center lg:space-x-2">
                {{--
                <a
                    type="button"
                    wire:navigate.hover
                    href="{{ route('settings.preferences') }}"
                    class="mr-4 inline-flex cursor-pointer items-center justify-center text-sm leading-none font-medium text-gray-900 dark:text-white"
                >
                    <span class="sr-only">Match Preferences</span>

                    <svg
                        class="me-1 h-5 w-5"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            d="M10.83 5a3.001 3.001 0 0 0-5.66 0H4a1 1 0 1 0 0 2h1.17a3.001 3.001 0 0 0 5.66 0H20a1 1 0 1 0 0-2h-9.17ZM4 11h9.17a3.001 3.001 0 0 1 5.66 0H20a1 1 0 1 1 0 2h-1.17a3.001 3.001 0 0 1-5.66 0H4a1 1 0 1 1 0-2Zm1.17 6H4a1 1 0 1 0 0 2h1.17a3.001 3.001 0 0 0 5.66 0H20a1 1 0 1 0 0-2h-9.17a3.001 3.001 0 0 0-5.66 0Z"
                        />
                    </svg>
                    <span class="hidden sm:block">Preferences</span>
                </a>

                <a
                    href="{{ route('browser.likes') }}"
                    wire:navigate.hover
                    type="button"
                    class="relative mr-6 inline-flex cursor-pointer items-center rounded-full bg-orange-300 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-orange-400 focus:ring-4 focus:ring-orange-200 focus:outline-none dark:hover:bg-orange-500 dark:focus:ring-orange-800"
                >
                    <svg
                        class="me-2 h-4 w-4"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M15.03 9.684h3.965c.322 0 .64.08.925.232.286.153.532.374.717.645a2.109 2.109 0 0 1 .242 1.883l-2.36 7.201c-.288.814-.48 1.355-1.884 1.355-2.072 0-4.276-.677-6.157-1.256-.472-.145-.924-.284-1.348-.404h-.115V9.478a25.485 25.485 0 0 0 4.238-5.514 1.8 1.8 0 0 1 .901-.83 1.74 1.74 0 0 1 1.21-.048c.396.13.736.397.96.757.225.36.32.788.269 1.211l-1.562 4.63ZM4.177 10H7v8a2 2 0 1 1-4 0v-6.823C3 10.527 3.527 10 4.176 10Z"
                            clip-rule="evenodd"
                        />
                    </svg>

                    <span class="sr-only">Likes</span>

                    <span class="hidden sm:flex">Likes</span>

                    <div
                        class="absolute -end-5 -top-3 inline-flex h-9 w-9 items-center justify-center rounded-full border-2 border-pink-50 bg-green-500 text-xs font-bold text-white dark:border-gray-800"
                    >
                        8
                    </div>
                </a>
                --}}