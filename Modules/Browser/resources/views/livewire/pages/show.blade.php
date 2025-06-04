<div>
    <x-customtheme::page-layouts.page-with-image-banner
        :title="$profile['first_name'].' '.$profile['last_name'][0].', '.$profile['dynamic_extras']['age']"
        :description="__('Looking for people | Long-term dating')"
        :image="false"
    >
        <x-slot name="body">
            <div class="justify-between lg:flex">
                <div class="px-4">
                    <div
                        class="mx-auto mb-4 flex max-w-md flex-col justify-center lg:max-w-none lg:flex-row"
                    >
                        <ul
                            class="order-2 mt-8 grid grid-cols-4 gap-4 lg:order-1 lg:mt-0 lg:block lg:space-y-4"
                            id="product-2-tab"
                            data-tabs-toggle="#product-2-tab-content"
                            data-tabs-active-classes="border-gray-200 dark:border-gray-700"
                            data-tabs-inactive-classes="border-transparent hover:border-gray-200 dark:hover:dark:border-gray-700 dark:border-transparent"
                            role="tablist"
                        >
                            <li class="me-2" role="presentation">
                                <button
                                    class="mx-auto h-20 w-20 cursor-pointer overflow-hidden rounded-lg border-2 p-2 sm:h-20 sm:w-20 md:h-24 md:w-24"
                                    id="product-2-image-1-tab"
                                    data-tabs-target="#product-2-image-1"
                                    type="button"
                                    role="tab"
                                    aria-controls="product-2-image-1"
                                    aria-selected="false"
                                >
                                    <img
                                        class="h-full w-full object-contain"
                                        src="https://pictures.match.com/photos/366/484/9ae68af9-1f38-f011-9b6a-6c92cf29d881.jpeg"
                                        alt=""
                                    />
                                </button>
                            </li>
                            <li class="me-2" role="presentation">
                                <button
                                    class="mx-auto h-20 w-20 cursor-pointer overflow-hidden rounded-lg border-2 p-2 sm:h-20 sm:w-20 md:h-24 md:w-24"
                                    id="product-2-image-2-tab"
                                    data-tabs-target="#product-2-image-2"
                                    type="button"
                                    role="tab"
                                    aria-controls="product-2-image-2"
                                    aria-selected="false"
                                >
                                    <img
                                        class="h-full w-full object-contain"
                                        src="https://pictures.match.com/photos/366/484/1ef93e72-2338-f011-9b6a-6c92cf29d881.jpeg"
                                        alt=""
                                    />
                                </button>
                            </li>
                            {{--
                                <li class="me-2" role="presentation">
                                <button
                                class="mx-auto h-20 w-20 cursor-pointer overflow-hidden rounded-lg border-2 p-2 sm:h-20 sm:w-20 md:h-24 md:w-24"
                                id="product-2-image-3-tab"
                                data-tabs-target="#product-2-image-3"
                                type="button"
                                role="tab"
                                aria-controls="product-2-image-3"
                                aria-selected="false"
                                >
                                <img
                                class="h-full w-full object-contain"
                                src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-components.svg"
                                alt=""
                                />
                                </button>
                                </li>
                                <li class="me-2" role="presentation">
                                <button
                                class="mx-auto h-20 w-20 cursor-pointer overflow-hidden rounded-lg border-2 p-2 sm:h-20 sm:w-20 md:h-24 md:w-24"
                                id="product-2-image-4-tab"
                                data-tabs-target="#product-2-image-4"
                                type="button"
                                role="tab"
                                aria-controls="product-2-image-4"
                                aria-selected="false"
                                >
                                <img
                                class="h-full w-full object-contain"
                                src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-side.svg"
                                alt=""
                                />
                                </button>
                                </li>
                            --}}
                        </ul>

                        <div
                            id="product-2-tab-content"
                            class="order-1 lg:order-2"
                        >
                            <div
                                class="hidden rounded-lg px-4"
                                id="product-2-image-1"
                                role="tabpanel"
                                aria-labelledby="product-2-image-1-tab"
                            >
                                <img
                                    class="mx-auto w-full rounded-4xl"
                                    src="https://pictures.match.com/photos/366/484/9ae68af9-1f38-f011-9b6a-6c92cf29d881.jpeg"
                                    alt=""
                                />
                            </div>

                            <div
                                class="hidden rounded-lg px-4"
                                id="product-2-image-2"
                                role="tabpanel"
                                aria-labelledby="product-2-image-2-tab"
                            >
                                <img
                                    class="mx-auto w-full rounded-4xl"
                                    src="https://pictures.match.com/photos/366/484/1ef93e72-2338-f011-9b6a-6c92cf29d881.jpeg"
                                    alt=""
                                />
                            </div>

                            <div
                                class="hidden rounded-lg px-4"
                                id="product-2-image-3"
                                role="tabpanel"
                                aria-labelledby="product-2-image-3-tab"
                            >
                                <img
                                    class="mx-auto w-full dark:hidden"
                                    src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-components.svg"
                                    alt=""
                                />
                                <img
                                    class="mx-auto hidden w-full dark:block"
                                    src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-components-dark.svg"
                                    alt=""
                                />
                            </div>

                            <div
                                class="hidden rounded-lg px-4"
                                id="product-2-image-4"
                                role="tabpanel"
                                aria-labelledby="product-2-image-4-tab"
                            >
                                <img
                                    class="mx-auto w-full dark:hidden"
                                    src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-side.svg"
                                    alt=""
                                />
                                <img
                                    class="mx-auto hidden w-full dark:block"
                                    src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-side-dark.svg"
                                    alt=""
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 w-full shrink-0 px-4 lg:mt-0 lg:max-w-2xl">
                    <div
                        class="rounded-4xl border border-gray-200 bg-white p-4 sm:p-6 lg:p-8 dark:border-gray-700 dark:bg-gray-800"
                    >
                        <div class="flex items-center gap-1">
                            <svg
                                class="h-5 w-5 text-red-700"
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
                                    d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                />
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z"
                                />
                            </svg>
                            <p
                                class="text-sm font-medium text-slate-700 dark:text-white"
                            >
                                Mortsel, België - niet ver van jou
                            </p>
                        </div>

                        <div
                            class="mt-8 space-y-6 border-t border-gray-200 pt-8 dark:border-gray-700"
                        >
                            <div
                                class="divide-y divide-gray-200 dark:divide-gray-700"
                            >
                                <dl
                                    class="flex items-center justify-between gap-4 py-3"
                                >
                                    <dt
                                        class="text-base font-normal text-gray-500 dark:text-gray-400"
                                    >
                                        Gender
                                        <br />
                                        Sex oriëntation
                                        <br />
                                        Relationship status
                                    </dt>

                                    <dd
                                        class="text-right text-base font-medium text-gray-900 dark:text-white"
                                    >
                                        {{ $this->summaryOfArray('genders') }}
                                        <br />
                                        {{ $this->summaryOfArray('orientations') }}
                                        <br />
                                        {{ $this->lookupKey('relationship_type') }}
                                    </dd>
                                </dl>

                                <dl
                                    class="flex items-center justify-between gap-4 py-3"
                                >
                                    <dt
                                        class="text-base font-normal text-gray-500 dark:text-gray-400"
                                    >
                                        Body type
                                        <br />
                                        Height
                                    </dt>
                                    <dd
                                        class="text-right text-base font-medium text-gray-900 dark:text-white"
                                    >
                                        Curvy
                                        <br />
                                        1m 84
                                    </dd>
                                </dl>

                                <dl
                                    class="flex items-center justify-between gap-4 py-3"
                                >
                                    <dt
                                        class="text-base font-normal text-gray-500 dark:text-gray-400"
                                    >
                                        Ethnicity
                                        <br />
                                        Politic
                                        <br />
                                        Languages
                                        <br />
                                        Education
                                        <br />
                                        Work status
                                        <br />
                                        Religion
                                        <br />
                                        Astrology
                                    </dt>
                                    <dd
                                        class="text-right text-base font-medium text-gray-900 dark:text-white"
                                    >
                                        {{ $this->summaryOfArray('ethnicities') }}
                                        <br />
                                        {{ $this->lookupKey('politics') }}
                                        <br />
                                        {{ $this->summaryOfArray('languages') }}
                                        <br />
                                        {{ $this->lookupKey('education') }}
                                        <br />
                                        {{ $this->lookupKey('employment') }}
                                        <br />
                                        {{ $this->lookupKey('religion') }}
                                        <br />
                                        {{ __("profile::options.zodiac.{$profile['dynamic_extras']['zodiac']}") }}
                                    </dd>
                                </dl>

                                <dl
                                    class="flex items-center justify-between gap-4 py-3"
                                >
                                    <dt
                                        class="text-base font-normal text-gray-500 dark:text-gray-400"
                                    >
                                        Smoke
                                        <br />
                                        Drink
                                        <br />
                                        Drugs
                                        <br />
                                        Diet
                                    </dt>
                                    <dd
                                        class="text-right text-base font-medium text-gray-900 dark:text-white"
                                    >
                                        {{ $this->lookupKey('smoke') }}
                                        <br />
                                        {{ $this->lookupKey('drink') }}
                                        <br />
                                        {{ $this->lookupKey('drugs') }}
                                        <br />
                                        {{ $this->lookupKey('diet') }}
                                    </dd>
                                </dl>

                                <dl
                                    class="flex items-center justify-between gap-4 py-3"
                                >
                                    <dt
                                        class="text-base font-normal text-gray-900 dark:text-gray-400"
                                    >
                                        Kids
                                        <br />
                                        Pets
                                    </dt>
                                    <dd
                                        class="text-right text-base font-normal text-gray-900 dark:text-white"
                                    >
                                        {{ $this->lookupKey('children') }}
                                        <br />
                                        {{ $this->summaryOfArray('pets') }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>

                    <div
                        class="mt-8 inline-flex rounded-full shadow-xs"
                        role="group"
                    >
                        <button
                            type="button"
                            class="inline-flex items-center rounded-s-full border border-gray-900 bg-transparent px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:bg-gray-900 focus:text-white focus:ring-2 focus:ring-gray-500 dark:border-white dark:text-white dark:hover:bg-gray-700 dark:hover:text-white dark:focus:bg-gray-700"
                        >
                            <svg
                                class="me-2 h-3 w-3"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"
                                />
                            </svg>
                            Block
                        </button>
                        <button
                            type="button"
                            class="inline-flex items-center rounded-e-full border border-s-0 border-gray-900 bg-transparent px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:bg-gray-900 focus:text-white focus:ring-2 focus:ring-gray-500 dark:border-white dark:text-white dark:hover:bg-gray-700 dark:hover:text-white dark:focus:bg-gray-700"
                        >
                            <svg
                                class="me-2 h-3 w-3"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z"
                                />
                                <path
                                    d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"
                                />
                            </svg>
                            Report
                        </button>
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="underbody">
            <section class="mt-36 py-8 antialiased md:py-8 xl:mt-32">
                <div
                    class="mx-auto w-full max-w-5xl px-4 xl:max-w-7xl 2xl:max-w-[90rem] 2xl:px-0"
                >
                    <!-- Add content here -->
                </div>
            </section>

            <section class="">
                <div
                    class="mx-auto w-full max-w-5xl px-4 py-8 xl:max-w-7xl 2xl:max-w-[90rem] 2xl:px-0"
                >
                    <div class="grid gap-20 lg:grid-cols-2">
                        <div>
                            <div
                                class="mb-5 space-y-5 rounded-3xl bg-white p-5 dark:bg-gray-950"
                            >
                                <div class="pb-5">
                                    <h3
                                        class="text-lg font-semibold text-gray-900 dark:text-white"
                                    >
                                        You and {{ $profile['first_name'] }}
                                    </h3>
                                    <div class="grid gap-8 lg:grid-cols-2">
                                        <div>
                                            <div
                                                class="group isolate z-0 grid place-items-center pt-18 leading-snug text-white will-change-transform"
                                                aria-label="Get started with NativePHP documentation"
                                                style="
                                                    transform: none;
                                                    opacity: 1;
                                                "
                                            >
                                                <img
                                                    class="absolute top-0 me-17 h-25 w-25 rounded-full border-2 border-white dark:border-black"
                                                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png"
                                                    alt="profile picture"
                                                />

                                                <img
                                                    class="absolute top-0 ms-17 h-25 w-25 rounded-full border-2 border-white dark:border-black"
                                                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png"
                                                    alt="profile picture"
                                                />

                                                <div
                                                    class="z-10 grid place-items-center self-center justify-self-center font-bold [grid-area:1/-1]"
                                                >
                                                    <div>88%</div>
                                                </div>

                                                <div
                                                    x-init="
                                                        () => {
                                                            motion.animate(
                                                                $el,
                                                                {
                                                                    rotate: [0, 180],
                                                                },
                                                                {
                                                                    duration: 6,
                                                                    repeat: Infinity,
                                                                    repeatType: 'loop',
                                                                    ease: 'linear',
                                                                },
                                                            )
                                                        }
                                                    "
                                                    class="self-center justify-self-center [grid-area:1/-1]"
                                                    aria-hidden="true"
                                                    style="
                                                        transform: rotate(
                                                            104.04deg
                                                        );
                                                    "
                                                >
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="size-19 text-white transition duration-500 ease-out will-change-transform group-hover:scale-110 dark:text-black"
                                                        viewBox="0 0 133 133"
                                                        fill="none"
                                                        aria-hidden="true"
                                                    >
                                                        <path
                                                            d="M133 66.5028C133 58.2246 128.093 50.5844 119.798 44.4237C121.305 34.2085 119.374 25.3317 113.518 19.4759C107.663 13.6202 98.7915 11.689 88.5707 13.1967C82.4213 4.9071 74.7811 0 66.5028 0C58.2246 0 50.5844 4.9071 44.4237 13.2023C34.2085 11.6946 25.3317 13.6258 19.4759 19.4816C13.6202 25.3374 11.689 34.2086 13.1967 44.4293C4.9071 50.5787 0 58.2246 0 66.5028C0 74.7811 4.9071 82.4213 13.2023 88.582C11.6946 98.7971 13.6258 107.674 19.4816 113.53C25.3374 119.385 34.2086 121.317 44.4293 119.809C50.5844 128.099 58.2302 133.011 66.5085 133.011C74.7867 133.011 82.4269 128.104 88.5876 119.809C98.8027 121.317 107.68 119.385 113.535 113.53C119.391 107.674 121.322 98.8027 119.815 88.582C128.104 82.4269 133.017 74.7811 133.017 66.5028H133Z"
                                                            fill="currentColor"
                                                        ></path>
                                                    </svg>
                                                </div>

                                                <div
                                                    x-init="
                                                        () => {
                                                            motion.animate(
                                                                $el,
                                                                {
                                                                    rotate: [0, 180],
                                                                },
                                                                {
                                                                    duration: 6,
                                                                    repeat: Infinity,
                                                                    repeatType: 'loop',
                                                                    ease: 'linear',
                                                                },
                                                            )
                                                        }
                                                    "
                                                    class="self-center justify-self-center [grid-area:1/-1]"
                                                    aria-hidden="true"
                                                    style="
                                                        transform: rotate(
                                                            104.04deg
                                                        );
                                                    "
                                                >
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="size-18 text-pink-400 transition duration-500 ease-out will-change-transform group-hover:scale-110"
                                                        viewBox="0 0 133 133"
                                                        fill="none"
                                                        aria-hidden="true"
                                                    >
                                                        <path
                                                            d="M133 66.5028C133 58.2246 128.093 50.5844 119.798 44.4237C121.305 34.2085 119.374 25.3317 113.518 19.4759C107.663 13.6202 98.7915 11.689 88.5707 13.1967C82.4213 4.9071 74.7811 0 66.5028 0C58.2246 0 50.5844 4.9071 44.4237 13.2023C34.2085 11.6946 25.3317 13.6258 19.4759 19.4816C13.6202 25.3374 11.689 34.2086 13.1967 44.4293C4.9071 50.5787 0 58.2246 0 66.5028C0 74.7811 4.9071 82.4213 13.2023 88.582C11.6946 98.7971 13.6258 107.674 19.4816 113.53C25.3374 119.385 34.2086 121.317 44.4293 119.809C50.5844 128.099 58.2302 133.011 66.5085 133.011C74.7867 133.011 82.4269 128.104 88.5876 119.809C98.8027 121.317 107.68 119.385 113.535 113.53C119.391 107.674 121.322 98.8027 119.815 88.582C128.104 82.4269 133.017 74.7811 133.017 66.5028H133Z"
                                                            fill="currentColor"
                                                        ></path>
                                                    </svg>
                                                </div>

                                                <div
                                                    class="hidden size-20 self-center justify-self-center bg-pink-400/70 blur-3xl [grid-area:1/-1] dark:block"
                                                    aria-hidden="true"
                                                ></div>
                                            </div>
                                        </div>

                                        <div>
                                            <div
                                                class="divide-y divide-gray-200 dark:divide-gray-700"
                                            >
                                                <dl
                                                    class="flex items-center justify-between gap-4 py-3"
                                                >
                                                    <dt
                                                        class="text-base font-normal text-gray-500 dark:text-gray-400"
                                                    >
                                                        Agree
                                                    </dt>

                                                    <dd
                                                        class="text-right text-base font-medium text-gray-900 dark:text-white"
                                                    >
                                                        8
                                                    </dd>
                                                </dl>

                                                <dl
                                                    class="flex items-center justify-between gap-4 py-3"
                                                >
                                                    <dt
                                                        class="text-base font-normal text-gray-500 dark:text-gray-400"
                                                    >
                                                        Disagree
                                                    </dt>
                                                    <dd
                                                        class="text-right text-base font-medium text-gray-900 dark:text-white"
                                                    >
                                                        4
                                                    </dd>
                                                </dl>

                                                <dl
                                                    class="flex items-center justify-between gap-4 py-3"
                                                >
                                                    <dt
                                                        class="text-base font-normal text-gray-500 dark:text-gray-400"
                                                    >
                                                        Find out
                                                    </dt>
                                                    <dd
                                                        class="text-right text-base font-medium text-gray-900 dark:text-white"
                                                    >
                                                        14
                                                    </dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="space-y-5 rounded-3xl bg-white p-5 dark:bg-gray-950"
                            >
                                <div
                                    class="border-b border-gray-200 pb-5 dark:border-gray-700"
                                >
                                    <h3
                                        class="text-lg font-semibold text-gray-900 dark:text-white"
                                    >
                                        On a typical Friday night I am
                                    </h3>
                                    <p
                                        class="mt-1 text-base font-normal text-gray-500 dark:text-gray-400"
                                    >
                                        Movie, anime night Gaming Comic Books
                                        Reading Concerts Hanging out with
                                        friends
                                    </p>
                                </div>

                                <div
                                    class="border-b border-gray-200 pb-5 dark:border-gray-700"
                                >
                                    <h3
                                        class="text-lg font-semibold text-gray-900 dark:text-white"
                                    >
                                        The most private thing I'm willing to
                                        admit
                                    </h3>
                                    <p
                                        class="mt-1 text-base font-normal text-gray-500 dark:text-gray-400"
                                    >
                                        I have played the guitar, piano and
                                        violin, but it has been a while now.
                                        Have to admit that sometimes I miss it.
                                    </p>
                                </div>

                                <div
                                    class="border-b border-gray-200 pb-5 dark:border-gray-700"
                                >
                                    <h3
                                        class="text-lg font-semibold text-gray-900 dark:text-white"
                                    >
                                        My self-summary
                                    </h3>
                                    <p
                                        class="mt-1 text-base font-normal text-gray-500 dark:text-gray-400"
                                    >
                                        Creative and sensitive soul with a
                                        desire to live life to the fullest in a
                                        mindful way. I will literally stop to
                                        smell the flowers and every cat gets a
                                        psst psst pssssst. I greatly enjoy art
                                        in all forms and love to draw. Anything
                                        fantasy related (DnD, cosplay, games,
                                        Rainessance fairs) will get an
                                        enthausiastic squeal like I’m a toddler
                                        in a candy store.
                                    </p>
                                </div>

                                <div
                                    class="border-b border-gray-200 pb-5 dark:border-gray-700"
                                >
                                    <h3
                                        class="text-lg font-semibold text-gray-900 dark:text-white"
                                    >
                                        Current goal
                                    </h3>
                                    <p
                                        class="mt-1 text-base font-normal text-gray-500 dark:text-gray-400"
                                    >
                                        Just bought and moved into my first
                                        house! So now focussing on unpacking all
                                        those boxes and finding cute and
                                        interesting places in the neighbourhood.
                                        Recommendations welcome!
                                    </p>
                                </div>

                                <div
                                    class="border-b border-gray-200 pb-5 dark:border-gray-700"
                                >
                                    <h3
                                        class="text-lg font-semibold text-gray-900 dark:text-white"
                                    >
                                        I like to make
                                    </h3>
                                    <p
                                        class="mt-1 text-base font-normal text-gray-500 dark:text-gray-400"
                                    >
                                        Drawings and paintings (both traditional
                                        and digital), photos, food and silly
                                        sounds.
                                    </p>
                                </div>

                                <div class="">
                                    <h3
                                        class="text-lg font-semibold text-gray-900 dark:text-white"
                                    >
                                        My style can be described as
                                    </h3>
                                    <p
                                        class="mt-1 text-base font-normal text-gray-500 dark:text-gray-400"
                                    >
                                        Whimsical goth? I’ve been called a
                                        pirate fairy once.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="mx-auto text-center">
                                <h2
                                    class="mb-4 text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white"
                                >
                                    Hear It Through Their Circle
                                </h2>
                                <p
                                    class="mb-8 font-light text-gray-500 sm:text-xl lg:mb-16 dark:text-gray-400"
                                >
                                    Read candid pitches from friends, family,
                                    <br />
                                    and colleagues who know this person best.
                                </p>
                            </div>

                            <div class="grid gap-8 lg:grid-cols-2">
                                <div class="space-y-6">
                                    <figure class="">
                                        <blockquote
                                            class="text-sm text-gray-500 dark:text-gray-400"
                                        >
                                            <h3
                                                class="text-lg font-semibold text-gray-900 dark:text-white"
                                            >
                                                The Ride-Or-Die Recommendation
                                            </h3>
                                            <p class="my-4">
                                                "I’ve known Alex since
                                                kindergarten—through every
                                                awkward growth spurt and
                                                questionable haircut. He’s the
                                                guy who’ll drop everything to
                                                help you move, but also waits in
                                                line for 90 minutes so you can
                                                have the first cold brew of
                                                summer. Loyal, hilarious, and
                                                surprisingly handy with an Allen
                                                wrench.”
                                            </p>
                                        </blockquote>
                                        <figcaption class="">
                                            <div
                                                class="space-y-0.5 font-medium dark:text-white"
                                            >
                                                <div>Best Friend</div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                    <figure class="">
                                        <blockquote
                                            class="text-sm text-gray-500 dark:text-gray-400"
                                        >
                                            <h3
                                                class="text-lg font-semibold text-gray-900 dark:text-white"
                                            >
                                                Sibling Insider Scoop
                                            </h3>
                                            <p class="my-4">
                                                "As Jonas’s older sister, I can
                                                confirm he’s the only person who
                                                will binge-watch true-crime
                                                documentaries and learn every
                                                obscure fact about the Cold
                                                War—then quiz you on them during
                                                dinner. He’s always got a new
                                                hobby (pottery, falconry, you
                                                name it) and the dedication to
                                                stick with it… usually until
                                                he’s crazy good at it.”
                                            </p>
                                        </blockquote>
                                        <figcaption class="">
                                            <div
                                                class="space-y-0.5 font-medium dark:text-white"
                                            >
                                                <div>Big Sis</div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                    <figure class="">
                                        <blockquote
                                            class="text-sm text-gray-500 dark:text-gray-400"
                                        >
                                            <h3
                                                class="text-lg font-semibold text-gray-900 dark:text-white"
                                            >
                                                Roommate’s Reality Check
                                            </h3>
                                            <p class="my-4">
                                                "He’s the only person I know who
                                                folds his laundry like a Marie
                                                Kondo demo—and still can’t
                                                resist adopting two more rescue
                                                kittens. Generous to a fault,
                                                he’ll share his last slice of
                                                pizza, his best concert tickets,
                                                and—if you’re lucky—his secret
                                                playlist of ’90s R&B."
                                            </p>
                                        </blockquote>
                                        <figcaption class="">
                                            <div
                                                class="space-y-0.5 font-medium dark:text-white"
                                            >
                                                <div>Roommate</div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>
                                <div class="space-y-6">
                                    <figure class="">
                                        <blockquote
                                            class="text-sm text-gray-500 dark:text-gray-400"
                                        >
                                            <h3
                                                class="text-lg font-semibold text-gray-900 dark:text-white"
                                            >
                                                Neighbor Next Door Insight
                                            </h3>
                                            <p class="my-4">
                                                "Every morning, you’ll see him
                                                jogging past with a friendly
                                                wave—rain or shine. He once
                                                organized a block party out of
                                                the blue and even built a little
                                                lending library on his porch.
                                                Thoughtful and community-minded,
                                                he’s the kind of guy everyone on
                                                the street counts on.”
                                            </p>
                                        </blockquote>
                                        <figcaption class="">
                                            <div
                                                class="space-y-0.5 font-medium dark:text-white"
                                            >
                                                <div>Next-Door Neighbor</div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                    <figure class="">
                                        <blockquote
                                            class="text-sm text-gray-500 dark:text-gray-400"
                                        >
                                            <h3
                                                class="text-lg font-semibold text-gray-900 dark:text-white"
                                            >
                                                Coach’s Sideline Shout-Out
                                            </h3>
                                            <p class="my-4">
                                                "On the field, he’s all
                                                hustle—never afraid to dive for
                                                the ball or cheer on a teammate.
                                                Off the field, he’s equally
                                                passionate, volunteering to
                                                coach the under-12s and making
                                                sure no kid feels left out.
                                                Leadership, kindness, and a
                                                killer kick."
                                            </p>
                                        </blockquote>
                                        <figcaption class="">
                                            <div
                                                class="space-y-0.5 font-medium dark:text-white"
                                            >
                                                <div>Coach</div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </x-slot>
    </x-customtheme::page-layouts.page-with-image-banner>

    <div
        class="fixed bottom-10 left-1/2 z-30 h-16 w-[300px] -translate-x-1/2 rounded-full border border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700"
    >
        @if ($likedByYou)
            <div class="absolute -bottom-8 w-full">
                <button
                    type="button"
                    class="text-medium mx-auto flex rounded-full bg-orange-300 px-5 py-1.5 font-bold text-white dark:text-white"
                >
                    You're liked by this person
                </button>
            </div>
        @endif

        <div class="absolute -top-20 w-full">
            <div
                x-init="
                    () => {
                        motion.animate(
                            $el,
                            {
                                scale: [0, 1],
                                opacity: [0, 1],
                            },
                            {
                                duration: 0.8,
                                ease: motion.backOut,
                            },
                        )
                    }
                "
                class="group isolate z-0 grid place-items-center leading-snug text-white will-change-transform"
                aria-label="Get started with NativePHP documentation"
                style="transform: none; opacity: 1"
            >
                <div
                    class="z-10 grid place-items-center self-center justify-self-center font-bold [grid-area:1/-1]"
                >
                    <div>88%</div>
                    <div>Match</div>
                </div>

                <div
                    x-init="
                        () => {
                            motion.animate(
                                $el,
                                {
                                    rotate: [0, 180],
                                },
                                {
                                    duration: 6,
                                    repeat: Infinity,
                                    repeatType: 'loop',
                                    ease: 'linear',
                                },
                            )
                        }
                    "
                    class="self-center justify-self-center [grid-area:1/-1]"
                    aria-hidden="true"
                    style="transform: rotate(22.44deg)"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="size-19 text-pink-400 transition duration-500 ease-out will-change-transform group-hover:scale-110"
                        viewBox="0 0 133 133"
                        fill="none"
                        aria-hidden="true"
                    >
                        <path
                            d="M133 66.5028C133 58.2246 128.093 50.5844 119.798 44.4237C121.305 34.2085 119.374 25.3317 113.518 19.4759C107.663 13.6202 98.7915 11.689 88.5707 13.1967C82.4213 4.9071 74.7811 0 66.5028 0C58.2246 0 50.5844 4.9071 44.4237 13.2023C34.2085 11.6946 25.3317 13.6258 19.4759 19.4816C13.6202 25.3374 11.689 34.2086 13.1967 44.4293C4.9071 50.5787 0 58.2246 0 66.5028C0 74.7811 4.9071 82.4213 13.2023 88.582C11.6946 98.7971 13.6258 107.674 19.4816 113.53C25.3374 119.385 34.2086 121.317 44.4293 119.809C50.5844 128.099 58.2302 133.011 66.5085 133.011C74.7867 133.011 82.4269 128.104 88.5876 119.809C98.8027 121.317 107.68 119.385 113.535 113.53C119.391 107.674 121.322 98.8027 119.815 88.582C128.104 82.4269 133.017 74.7811 133.017 66.5028H133Z"
                            fill="currentColor"
                        ></path>
                    </svg>
                </div>

                <div
                    class="hidden size-20 self-center justify-self-center bg-pink-400/70 blur-3xl [grid-area:1/-1] dark:block"
                    aria-hidden="true"
                ></div>
            </div>
        </div>

        <div class="mx-auto grid h-full max-w-lg grid-cols-3">
            <button
                wire:click="passOn"
                data-tooltip-target="tooltip-pass"
                type="button"
                class="inline-flex flex-col items-center justify-center rounded-s-full bg-red-400 px-5 hover:bg-red-300"
            >
                <svg
                    class="h-7 w-7 text-white group-hover:text-slate-50 dark:group-hover:text-red-500"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        fill-rule="evenodd"
                        d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z"
                        clip-rule="evenodd"
                    />
                </svg>

                <span class="sr-only">Pass</span>
            </button>
            <div
                id="tooltip-pass"
                role="tooltip"
                class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-xs transition-opacity duration-300 dark:bg-gray-700"
            >
                Pass
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>

            <div class="flex items-center justify-center">
                <button
                    wire:click="like"
                    data-tooltip-target="tooltip-like"
                    type="button"
                    class="group inline-flex h-full w-full items-center justify-center bg-green-400 font-medium hover:bg-green-300"
                >
                    <svg
                        class="h-10 w-10 text-white"
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
                        ></path>
                    </svg>

                    <span class="sr-only">Like</span>
                </button>
            </div>
            <div
                id="tooltip-like"
                role="tooltip"
                class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-xs transition-opacity duration-300 dark:bg-gray-700"
            >
                Like
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>

            <button
                data-tooltip-target="tooltip-message"
                type="button"
                class="group inline-flex flex-col items-center justify-center rounded-e-full bg-blue-400 px-5 hover:bg-blue-300"
            >
                <svg
                    class="h-7 w-7 text-white"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        d="M2.038 5.61A2.01 2.01 0 0 0 2 6v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6c0-.12-.01-.238-.03-.352l-.866.65-7.89 6.032a2 2 0 0 1-2.429 0L2.884 6.288l-.846-.677Z"
                    />
                    <path
                        d="M20.677 4.117A1.996 1.996 0 0 0 20 4H4c-.225 0-.44.037-.642.105l.758.607L12 10.742 19.9 4.7l.777-.583Z"
                    />
                </svg>

                <span class="sr-only">Send message = like</span>
            </button>
            <div
                id="tooltip-message"
                role="tooltip"
                class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-xs transition-opacity duration-300 dark:bg-gray-700"
            >
                Send message equals sending a like
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>
    </div>
</div>
