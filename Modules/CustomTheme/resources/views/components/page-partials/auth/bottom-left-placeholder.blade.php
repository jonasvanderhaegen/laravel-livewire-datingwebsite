<div>
    <div
        x-data="{ activeTab: @entangle('activeTab') }"
        class="flex justify-center"
    >
        <ul
            class="flex flex-wrap gap-8 text-center"
            id="deviceTabs"
            role="tablist"
        >
            <li
                role="presentation"
                class="inline-flex flex-col items-center gap-2.5"
            >
                <button
                    @click="activeTab = 'ios'"
                    :class="activeTab === 'ios' ? '!text-white' : ''"
                    id="ios-tab"
                    class="inline-flex h-12 w-12 items-center justify-center rounded-lg bg-gray-800 text-gray-400 hover:bg-gray-700 aria-selected:bg-gray-800 aria-selected:text-white"
                    type="button"
                    role="tab"
                    aria-controls="ios"
                    aria-selected="false"
                >
                    <svg
                        aria-hidden="true"
                        class="h-8 w-8"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                    >
                        <path
                            d="M19.665 16.811a10.316 10.316 0 0 1-1.021 1.837c-.537.767-.978 1.297-1.316 1.592-.525.482-1.089.73-1.692.744-.432 0-.954-.123-1.562-.373-.61-.249-1.17-.371-1.683-.371-.537 0-1.113.122-1.73.371-.616.25-1.114.381-1.495.393-.577.025-1.154-.229-1.729-.764-.367-.32-.826-.87-1.377-1.648-.59-.829-1.075-1.794-1.455-2.891-.407-1.187-.611-2.335-.611-3.447 0-1.273.275-2.372.826-3.292a4.857 4.857 0 0 1 1.73-1.751 4.65 4.65 0 0 1 2.34-.662c.46 0 1.063.142 1.81.422s1.227.422 1.436.422c.158 0 .689-.167 1.593-.498.853-.307 1.573-.434 2.163-.384 1.6.129 2.801.759 3.6 1.895-1.43.867-2.137 2.08-2.123 3.637.012 1.213.453 2.222 1.317 3.023a4.33 4.33 0 0 0 1.315.863c-.106.307-.218.6-.336.882zM15.998 2.38c0 .95-.348 1.838-1.039 2.659-.836.976-1.846 1.541-2.941 1.452a2.955 2.955 0 0 1-.021-.36c0-.913.396-1.889 1.103-2.688.352-.404.8-.741 1.343-1.009.542-.264 1.054-.41 1.536-.435.013.128.019.255.019.381z"
                        ></path>
                    </svg>
                    <span class="sr-only">iOS</span>
                </button>
                <span class="text-base font-medium text-slate-400">iOS</span>
            </li>

            <li
                role="presentation"
                class="inline-flex flex-col items-center gap-2.5"
            >
                <button
                    @click="activeTab = 'google'"
                    :class="activeTab === 'google' ? '!text-white' : ''"
                    id="android-tab"
                    class="inline-flex h-12 w-12 items-center justify-center rounded-lg bg-gray-800 text-gray-400 hover:bg-gray-700 aria-selected:bg-gray-800 aria-selected:text-white"
                    type="button"
                    role="tab"
                    aria-controls="android"
                    aria-selected="false"
                >
                    <svg
                        class="h-8 w-8"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M12.037 21.998a10.313 10.313 0 0 1-7.168-3.049 9.888 9.888 0 0 1-2.868-7.118 9.947 9.947 0 0 1 3.064-6.949A10.37 10.37 0 0 1 12.212 2h.176a9.935 9.935 0 0 1 6.614 2.564L16.457 6.88a6.187 6.187 0 0 0-4.131-1.566 6.9 6.9 0 0 0-4.794 1.913 6.618 6.618 0 0 0-2.045 4.657 6.608 6.608 0 0 0 1.882 4.723 6.891 6.891 0 0 0 4.725 2.07h.143c1.41.072 2.8-.354 3.917-1.2a5.77 5.77 0 0 0 2.172-3.41l.043-.117H12.22v-3.41h9.678c.075.617.109 1.238.1 1.859-.099 5.741-4.017 9.6-9.746 9.6l-.215-.002Z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </button>
                <span class="text-base font-medium text-slate-400">Google</span>
            </li>

            <li
                role="presentation"
                class="inline-flex flex-col items-center gap-2.5"
            >
                <button
                    @click="activeTab = 'browser-extension'"
                    :class="activeTab === 'browser-extension' ? '!text-white' : ''"
                    id="android-tab"
                    class="inline-flex h-12 w-12 items-center justify-center rounded-lg bg-gray-800 text-gray-400 hover:bg-gray-700 aria-selected:bg-gray-800 aria-selected:text-white"
                    type="button"
                    role="tab"
                    aria-controls="android"
                    aria-selected="false"
                >
                    <svg
                        class="h-8 w-8"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            d="M12.356 3.066a1 1 0 0 0-.712 0l-7 2.666A1 1 0 0 0 4 6.68a17.695 17.695 0 0 0 2.022 7.98 17.405 17.405 0 0 0 5.403 6.158 1 1 0 0 0 1.15 0 17.406 17.406 0 0 0 5.402-6.157A17.694 17.694 0 0 0 20 6.68a1 1 0 0 0-.644-.949l-7-2.666Z"
                        />
                    </svg>
                </button>
                <span class="text-base font-medium text-slate-400">
                    Password
                    <br />
                    Manager
                </span>
            </li>
        </ul>
    </div>

    <div
        id="deviceTabContent"
        class="mt-8"
        x-data="{ activeTab: @entangle('activeTab') }"
    >
        <div
            class=""
            id="ios"
            role="tabpanel"
            aria-labelledby="ios-tab"
            x-show="activeTab === 'ios'"
        >
            <div class="space-y-4 sm:space-y-6 lg:space-y-8">
                <div>
                    <h3
                        class="text-2xl leading-tight font-extrabold text-orange-300"
                    >
                        Apple iOS
                    </h3>
                    <p
                        class="mt-4 text-base font-normal text-slate-50 sm:text-xl"
                    >
                        Apple actually stores your passkeys in your iCloud
                        storage after you register a passkey on any Apple
                        device, so you can simply re-use it everywhere. Here's
                        how to use it assuming you've stored the passkey in
                        iCloud storage and you're signed in with your apple
                        account.
                    </p>
                </div>

                <div
                    id="accordion-flush"
                    data-accordion="collapse"
                    data-active-classes="!text-white"
                    data-inactive-classes="text-slate-400"
                >
                    <h2 id="accordion-flush-heading-1">
                        <button
                            type="button"
                            class="flex w-full items-center justify-between gap-3 border-b border-slate-400 py-5 font-medium text-gray-500 rtl:text-right"
                            data-accordion-target="#accordion-flush-body-1"
                            aria-expanded="true"
                            aria-controls="accordion-flush-body-1"
                        >
                            <span>
                                I'm on my apple computer, using
                                chrome/firefox/edge browser
                            </span>
                            <svg
                                data-accordion-icon
                                class="h-3 w-3 shrink-0 rotate-180"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 10 6"
                            >
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5 5 1 1 5"
                                />
                            </svg>
                        </button>
                    </h2>
                    <div
                        id="accordion-flush-body-1"
                        class="hidden"
                        aria-labelledby="accordion-flush-heading-1"
                    >
                        <div
                            class="border-b border-slate-400 py-5 text-slate-50"
                        >
                            <p class="mb-2">
                                Great start! simply click the lock and select
                                your passkey.
                            </p>
                            <p class="">
                                In case you've also password manager and chrome
                                extension/firefox plugin/etc enabled on current
                                browser you'll have to click the prompt of the
                                extension away first in order to get a prompt
                                from iOS to select your passkey.
                            </p>
                        </div>
                    </div>
                    <h2 id="accordion-flush-heading-2">
                        <button
                            type="button"
                            class="flex w-full items-center justify-between gap-3 border-b border-slate-400 py-5 font-medium text-gray-500 rtl:text-right"
                            data-accordion-target="#accordion-flush-body-2"
                            aria-expanded="false"
                            aria-controls="accordion-flush-body-2"
                        >
                            <span>
                                I'm on someone else's device, I've my apple's
                                device on my person
                            </span>
                            <svg
                                data-accordion-icon
                                class="h-3 w-3 shrink-0 rotate-180"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 10 6"
                            >
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5 5 1 1 5"
                                />
                            </svg>
                        </button>
                    </h2>
                    <div
                        id="accordion-flush-body-2"
                        class="hidden"
                        aria-labelledby="accordion-flush-heading-2"
                    >
                        <div
                            class="border-b border-slate-400 py-5 text-slate-50"
                        >
                            <p class="mb-2">
                                Click the lock, depending on the current device
                                and browser you're on it will show prompts where
                                you must actually continue or click it away to
                                get the option you actually want, which is other
                                devices.
                            </p>

                            <p class="mb-2">
                                Selecting this will show a QR code which you can
                                scan with your Apple camera on your apple
                                device. After doing so this will show a little
                                prompt on your apple device to select your
                                passkey. Selecting this will log you in
                                succesfully.
                            </p>

                            <p class="">
                                In case there's a also password manager and
                                chrome extension/firefox plugin/etc enabled on
                                current browser you'll have to click the prompt
                                of the extension away first in order to
                                continue.
                            </p>
                        </div>
                    </div>
                    <h2 id="accordion-flush-heading-3">
                        <button
                            type="button"
                            class="flex w-full items-center justify-between gap-3 border-b border-slate-400 py-5 font-medium text-gray-500 rtl:text-right"
                            data-accordion-target="#accordion-flush-body-3"
                            aria-expanded="false"
                            aria-controls="accordion-flush-body-3"
                        >
                            <span>
                                I'm on someone else's device, I don't have my
                                apple's device on my person
                            </span>
                            <svg
                                data-accordion-icon
                                class="h-3 w-3 shrink-0 rotate-180"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 10 6"
                            >
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5 5 1 1 5"
                                />
                            </svg>
                        </button>
                    </h2>
                    <div
                        id="accordion-flush-body-3"
                        class="hidden"
                        aria-labelledby="accordion-flush-heading-3"
                    >
                        <div
                            class="border-b border-slate-400 py-5 text-slate-50"
                        >
                            <p class="mb-4">
                                Sorry for the inconvenience, in that case you
                                can use classic login form or one time password.
                            </p>

                            <a
                                href="{{ route('one-time-password') }}"
                                wire:navigate.hover
                                class="mb-4 inline-flex items-center rounded-full bg-blue-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:bg-blue-500 dark:hover:bg-blue-500 dark:focus:ring-blue-800"
                            >
                                Click here to log in with one time password
                                <svg
                                    class="ms-2 h-3.5 w-3.5 rtl:rotate-180"
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
                                    ></path>
                                </svg>
                            </a>

                            <a
                                href="{{ route('classicauth.login') }}"
                                wire:navigate.hover
                                class=" inline-flex items-center rounded-full bg-blue-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:bg-blue-500 dark:hover:bg-blue-500 dark:focus:ring-blue-800"
                            >
                                Click here to log in with classic password
                                <svg
                                    class="ms-2 h-3.5 w-3.5 rtl:rotate-180"
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
                                    ></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div
            class=""
            id="google"
            role="tabpanel"
            aria-labelledby="google-tab"
            x-show="activeTab === 'google'"
        >
            <div class="space-y-4 sm:space-y-6 lg:space-y-8">
                <div>
                    <h3
                        class="text-2xl leading-tight font-extrabold text-orange-300"
                    >
                        Flowbite in Android: Take control of your finances with
                        us
                    </h3>
                    <p
                        class="mt-4 text-base font-normal text-gray-500 sm:text-xl dark:text-gray-400"
                    >
                        Our app helps users easily track their expenses and
                        create a budget. With a user-friendly interface, the app
                        allows users to quickly input their income and expenses,
                        and then automatically categorizes them for easy
                        tracking.
                    </p>
                </div>

                <div
                    class="border-t border-gray-200 pt-4 sm:pt-6 lg:pt-8 dark:border-gray-800"
                >
                    <ul class="space-y-4">
                        <li class="flex items-center gap-2.5">
                            <div
                                class="bg-primary-100 text-primary-600 dark:bg-primary-900 dark:text-primary-500 inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-full"
                            >
                                <svg
                                    aria-hidden="true"
                                    class="h-3.5 w-3.5"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </div>
                            <span
                                class="text-base font-medium text-gray-900 dark:text-white"
                            >
                                Seamless integration with Android Studio
                            </span>
                        </li>

                        <li class="flex items-center gap-2.5">
                            <div
                                class="bg-primary-100 text-primary-600 dark:bg-primary-900 dark:text-primary-500 inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-full"
                            >
                                <svg
                                    aria-hidden="true"
                                    class="h-3.5 w-3.5"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </div>
                            <span
                                class="text-base font-medium text-gray-900 dark:text-white"
                            >
                                Deployments with a click of a button
                            </span>
                        </li>

                        <li class="flex items-center gap-2.5">
                            <div
                                class="bg-primary-100 text-primary-600 dark:bg-primary-900 dark:text-primary-500 inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-full"
                            >
                                <svg
                                    aria-hidden="true"
                                    class="h-3.5 w-3.5"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </div>
                            <span
                                class="text-base font-medium text-gray-900 dark:text-white"
                            >
                                Lightning fast performance
                            </span>
                        </li>
                    </ul>

                    <h3
                        class="mt-6 text-xl font-normal text-gray-500 dark:text-gray-400"
                    >
                        Flowbite takes the hassle out of budgeting and empowers
                        users to take control of their finances.
                    </h3>
                </div>

                <div>
                    <a
                        href="#"
                        title=""
                        class="text-primary-600 dark:text-primary-500 inline-flex items-center text-base font-medium hover:underline"
                    >
                        Check out the Android app features
                        <svg
                            aria-hidden="true"
                            class="ml-1.5 h-5 w-5"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
