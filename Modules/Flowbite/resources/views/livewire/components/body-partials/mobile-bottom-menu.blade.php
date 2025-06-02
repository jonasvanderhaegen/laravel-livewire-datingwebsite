<div
    class="fixed bottom-0 left-1/2 z-50 w-full -translate-x-1/2 rounded-t-4xl border-t-1 border-gray-200 bg-white dark:border-slate-800 dark:bg-slate-950"
>
    <div class="w-full">
        <div
            class="mx-auto my-2 grid max-w-xs grid-cols-2 gap-1 rounded-full bg-gray-100 p-1 dark:bg-slate-800"
            data-tabs-toggle="#menu-tab-content"
            role="tablist"
            data-tabs-active-classes="bg-gray-900 text-white dark:bg-slate-400 dark:text-slate-900"
        >
            @foreach ($tabs as $tab)
                <x-flowbite::body-partials.mobile-bottom-menu.tab
                    :tab="$tab"
                />
            @endforeach
        </div>
    </div>

    <div id="menu-tab-content">
        <div
            id="general"
            role="tabpanel"
            aria-labelledby="general-tab"
            class="mx-auto grid hidden h-full max-w-lg grid-cols-4"
        >
            <a
                href="{{ route('flowbite.home') }}"
                wire:navigate.hover
                type="button"
                class="group inline-flex flex-col items-center justify-center p-4 hover:bg-gray-50 dark:hover:bg-gray-800"
            >
                <svg
                    class="mb-1 h-5 w-5 text-gray-500 group-hover:text-blue-600 dark:text-gray-400 dark:group-hover:text-blue-500"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                >
                    <path
                        d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"
                    />
                </svg>
                <span class="sr-only">Home</span>
            </a>

            <button
                type="button"
                class="group inline-flex flex-col items-center justify-center p-4 hover:bg-gray-50 dark:hover:bg-gray-800"
            >
                <svg
                    class="mb-1 h-5 w-5 text-gray-500 group-hover:text-blue-600 dark:text-gray-400 dark:group-hover:text-blue-500"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 14 20"
                >
                    <path
                        d="M13 20a1 1 0 0 1-.64-.231L7 15.3l-5.36 4.469A1 1 0 0 1 0 19V2a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v17a1 1 0 0 1-1 1Z"
                    />
                </svg>
                <span class="sr-only">Bookmark</span>
            </button>

            <a
                href="{{ route('flowbite.home') }}"
                wire:navigate.hover
                type="button"
                class="group inline-flex flex-col items-center justify-center p-4 hover:bg-gray-50 dark:hover:bg-gray-800"
            >
                <svg
                    class="mb-1 h-7 w-7 text-gray-500 group-hover:text-blue-600 dark:text-gray-400 dark:group-hover:text-blue-500"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        fill-rule="evenodd"
                        d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.008-3.018a1.502 1.502 0 0 1 2.522 1.159v.024a1.44 1.44 0 0 1-1.493 1.418 1 1 0 0 0-1.037.999V14a1 1 0 1 0 2 0v-.539a3.44 3.44 0 0 0 2.529-3.256 3.502 3.502 0 0 0-7-.255 1 1 0 0 0 2 .076c.014-.398.187-.774.48-1.044Zm.982 7.026a1 1 0 1 0 0 2H12a1 1 0 1 0 0-2h-.01Z"
                        clip-rule="evenodd"
                    />
                </svg>

                <span class="sr-only">Help</span>
            </a>

            <a
                href="{{ 'login' }}"
                wire:navigate.hover
                type="button"
                class="group inline-flex flex-col items-center justify-center p-4 hover:bg-gray-50 dark:hover:bg-gray-800"
            >
                <svg
                    class="mb-1 h-7 w-7 text-gray-500 group-hover:text-blue-600 dark:text-gray-400 dark:group-hover:text-blue-500"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        fill-rule="evenodd"
                        d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                        clip-rule="evenodd"
                    />
                </svg>

                <span class="sr-only">Account</span>
            </a>
        </div>

        <div
            id="preferences"
            role="tabpanel"
            aria-labelledby="preferences-tab"
            class="mx-auto grid hidden h-full max-w-lg grid-cols-3"
        >
            <button
                type="button"
                class="group inline-flex flex-col items-center justify-center p-4 hover:bg-gray-50 dark:hover:bg-gray-800"
            >
                <svg
                    class="mb-1 h-7 w-7 text-gray-500 group-hover:text-blue-600 dark:text-gray-400 dark:group-hover:text-blue-500"
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
                        d="M6 6h8m-8 4h12M6 14h8m-8 4h12"
                    />
                </svg>

                <span class="sr-only">Sidebar for left handed</span>
            </button>

            <button
                type="button"
                class="group inline-flex flex-col items-center justify-center p-4 hover:bg-gray-50 dark:hover:bg-gray-800"
            >
                <svg
                    class="mb-1 h-7 w-7 text-gray-500 group-hover:text-blue-600 dark:text-gray-400 dark:group-hover:text-blue-500"
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
                        d="m13 19 3.5-9 3.5 9m-6.125-2h5.25M3 7h7m0 0h2m-2 0c0 1.63-.793 3.926-2.239 5.655M7.5 6.818V5m.261 7.655C6.79 13.82 5.521 14.725 4 15m3.761-2.345L5 10m2.761 2.655L10.2 15"
                    />
                </svg>

                <span class="sr-only">Language</span>
            </button>

            <button
                type="button"
                class="group -mt-1 inline-flex flex-col items-center justify-center px-4 py-0"
                wire:ignore
            >
                <x-flowbite::dark-toggle
                    class="!text-gray-500 dark:!text-gray-400"
                />
            </button>
        </div>
    </div>
</div>
