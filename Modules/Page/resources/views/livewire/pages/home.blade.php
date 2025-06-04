<div>
    @if ($isMobile ?? false)
        <section class="bg-white dark:bg-gray-900">
            <x-flowbite::boxed-width class="pt-8 text-center">
                <x-slot name="body">
                    <h1
                        class="mb-4 text-4xl leading-none font-extrabold tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white"
                    >
                        {{ __('page::home.hero.title') }}
                    </h1>

                    <p
                        class="mb-8 font-light text-gray-500 sm:px-16 md:text-lg lg:text-xl xl:px-48 dark:text-gray-400"
                    >
                        {{ __('page::home.hero.subtitle') }}
                    </p>

                    <div
                        class="mb-8 flex flex-row justify-center space-x-4 lg:mb-16"
                    >
                        <a
                            href="{{ route('register') }}"
                            wire:navigate.hover
                            class="inline-flex items-center justify-center rounded-lg bg-blue-500 px-5 py-3 text-center text-base font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-800 dark:focus:ring-blue-900"
                        >
                            Sign up
                        </a>

                        <a
                            href="#"
                            class="inline-flex items-center justify-center rounded-lg border border-gray-300 px-5 py-3 text-center text-base font-medium text-gray-900 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-800"
                        >
                            Find out more
                            <svg
                                class="-mr-1 ml-2 h-5 w-5"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                        </a>
                    </div>

                    <x-flowbite::svg.couple-dancing-music
                        class="z-1 mx-auto lg:mb-8"
                    />

                    {{--
                        <img class="mx-auto mb-5 lg:mb-8 border border-gray-200 rounded-lg shadow-xl dark:border-gray-600 z-1 dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/hero/dashboard-mockup.svg" alt="dashboard overview">
                        <img class="mx-auto mb-5 lg:mb-8 border border-gray-200 rounded-lg shadow-xl dark:border-gray-600 hidden dark:block z-1" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/hero/dashboard-mockup-dark.svg" alt="dashboard overview dark">
                    --}}
                </x-slot>
            </x-flowbite::boxed-width>

            <div
                class="z-2 -mt-48 bg-blue-500 pt-48 pb-10 sm:-mt-80 sm:pt-80 lg:pb-16 dark:bg-blue-950"
            >
                <x-flowbite::boxed-width class="mt-8 text-center">
                    <x-slot name="body">
                        <div
                            class="transition duration-200 ease-in-out will-change-transform group-hover:-translate-x-1"
                        >
                            <h1
                                class="mb-4 bg-clip-text text-3xl leading-none font-extrabold tracking-tight text-transparent xl:text-5xl"
                                style="
                                    background-image: linear-gradient(
                                        90deg,
                                        #f6ad55 0%,
                                        white 35%,
                                        #f6ad55 70%
                                    );
                                    background-size: 200% 100%;
                                    animation: shine 2s linear infinite;
                                "
                            >
                                {{ __('page::home.community.heading') }}
                            </h1>

                            {{-- Heart 1 --}}
                            <div
                                class="absolute top-0 origin-center"
                                style="
                                    opacity: 1;
                                    transform: translateX(1px) translateY(-40px);
                                "
                                aria-hidden="true"
                            >
                                <x-customtheme::icons.heart
                                    class="size-[29px] text-red-400"
                                />
                            </div>

                            {{-- Heart 2 --}}
                            <div
                                class="absolute top-0 origin-center"
                                style="
                                    opacity: 1;
                                    transform: translateX(20px)
                                        translateY(-80px) rotate(20deg);
                                "
                                aria-hidden="true"
                            >
                                <x-customtheme::icons.heart
                                    class="size-[27px] text-red-400"
                                />
                            </div>

                            {{-- Heart 3 --}}
                            <div
                                class="absolute top-0 origin-center"
                                style="
                                    opacity: 1;
                                    transform: translateX(-10px)
                                        translateY(-70px) rotate(-20deg);
                                "
                                aria-hidden="true"
                            >
                                <x-customtheme::icons.heart
                                    class="size-[25px] text-red-400"
                                />
                            </div>
                        </div>

                        <p
                            class="mb-4 font-light text-white lg:mb-8 xl:text-2xl"
                        >
                            {{ __('page::home.community.testimonials_cta') }}
                            <a
                                href="{{ route('testimonials.index') }}"
                                wire:navigate.hover
                                class="inline-flex items-center font-medium text-white hover:underline"
                            >
                                {{ __('page::home.community.testimonials_click') }}
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

                        <div
                            id="testimonial-carousel"
                            class="relative"
                            data-carousel="slide"
                        >
                            <div
                                class="relative mx-auto h-52 max-w-screen-md overflow-x-hidden overflow-y-visible rounded-lg sm:h-48"
                            >
                                <livewire:testimonial::home-carousel-component />
                            </div>
                            <div class="flex items-center justify-center">
                                <button
                                    type="button"
                                    class="group mr-4 flex h-full cursor-pointer items-center justify-center focus:outline-none"
                                    data-carousel-prev
                                >
                                    <span
                                        class="text-white hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200"
                                    >
                                        <svg
                                            class="h-6 w-6"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                                                clip-rule="evenodd"
                                            ></path>
                                        </svg>
                                        <span class="hidden">Previous</span>
                                    </span>
                                </button>
                                <button
                                    type="button"
                                    class="group flex h-full cursor-pointer items-center justify-center focus:outline-none"
                                    data-carousel-next
                                >
                                    <span
                                        class="text-white hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200"
                                    >
                                        <svg
                                            class="h-6 w-6"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                                clip-rule="evenodd"
                                            ></path>
                                        </svg>
                                        <span class="hidden">Next</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </x-slot>
                </x-flowbite::boxed-width>
            </div>

            <x-flowbite::boxed-width class="mt-8 pb-10">
                <x-slot name="body">
                    <h1
                        class="mb-4 text-center text-3xl leading-none font-extrabold tracking-tight text-black dark:text-white"
                        style=""
                    >
                        Step by step
                    </h1>

                    <ol
                        class="relative border-s border-gray-200 dark:border-gray-700"
                    >
                        <li class="ms-6 mb-10">
                            <span
                                class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-blue-100 ring-8 ring-white dark:bg-blue-900 dark:ring-gray-900"
                            >
                                1
                            </span>
                            <h3
                                class="mb-1 flex items-center text-lg font-semibold text-gray-900 dark:text-white"
                            >
                                Registration, onboarding, review of profile
                            </h3>

                            <p
                                class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400"
                            >
                                After registration there's a short onboarding
                                process. You will be able to review your
                                profile, edit and make it public.
                            </p>
                        </li>
                        <li class="ms-6 mb-10">
                            <span
                                class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-blue-100 ring-8 ring-white dark:bg-blue-900 dark:ring-gray-900"
                            >
                                2
                            </span>
                            <h3
                                class="mb-1 text-lg font-semibold text-gray-900 dark:text-white"
                            >
                                Browsing and being active
                            </h3>

                            <p
                                class="text-base font-normal text-gray-500 dark:text-gray-400"
                            >
                                Other people will be able to find your profile
                                in case you're paying attention to the platform.
                                All filters are available. There's no algorithm,
                                score or AI.
                            </p>
                        </li>
                        <li class="ms-6 mb-10">
                            <span
                                class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-blue-100 ring-8 ring-white dark:bg-blue-900 dark:ring-gray-900"
                            >
                                3
                            </span>
                            <h3
                                class="mb-1 text-lg font-semibold text-gray-900 dark:text-white"
                            >
                                Liking and matching
                            </h3>

                            <p
                                class="text-base font-normal text-gray-500 dark:text-gray-400"
                            >
                                While you have a match you're not allowed to
                                like or talk with other profiles that liked you
                                until your match is broken up.
                            </p>
                        </li>

                        <li class="ms-6 mb-10">
                            <span
                                class="absolute -start-4 flex h-7.5 w-7.5 items-center justify-center rounded-full bg-blue-100 ring-8 ring-white dark:bg-blue-900 dark:ring-gray-900"
                            >
                                <x-customtheme::icons.heart
                                    class="h-4.5 w-4.5 text-red-500"
                                />
                            </span>
                            <h3
                                class="mb-1 text-lg font-semibold text-gray-900 dark:text-white"
                            >
                                Best of luck
                            </h3>

                            <p
                                class="text-base font-normal text-gray-500 dark:text-gray-400"
                            >
                                Hopefully with this change of flow, you'll find
                                someone who matches you.
                            </p>
                        </li>

                        <li class="ms-6">
                            <span
                                class="absolute -start-4 flex h-7.5 w-7.5 items-center justify-center rounded-full bg-blue-100 ring-8 ring-white dark:bg-blue-900 dark:ring-gray-900"
                            >
                                <svg
                                    class="h-6 w-6 text-green-500 dark:text-white"
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
                            </span>
                            <h3
                                class="mb-1 text-lg font-semibold text-gray-900 dark:text-white"
                            >
                                Your gratitude means the world to me
                            </h3>

                            <p
                                class="text-base font-normal text-gray-500 dark:text-gray-400"
                            >
                                Please leave a testimonial on our website.
                                <br />
                                You can also support us greatly by donating.
                                This platform is created by Jonas Vanderhaegen.
                            </p>
                        </li>
                    </ol>
                </x-slot>
            </x-flowbite::boxed-width>
        </section>
    @else
        <section class="text-slate-50">
            <div class="grid lg:grid-cols-2">
                <div
                    class="flex items-center justify-center px-4 py-6 sm:px-0 lg:py-0"
                >
                    <div
                        class="mx-auto max-w-screen-xl space-y-12 px-4 py-8 sm:py-16 lg:space-y-20 lg:px-30"
                    >
                        <!-- Row -->
                        <div
                            class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16"
                        >
                            <div class="text-slate-50 sm:text-lg">
                                <h2
                                    x-init="
                                        () => {
                                            motion.animate(
                                                $el,
                                                {
                                                    opacity: [0, 1],
                                                    x: [-10, 0],
                                                },
                                                {
                                                    duration: 1,
                                                    ease: motion.easeOut,
                                                },
                                            )
                                        }
                                    "
                                    class="mb-4 text-4xl font-extrabold tracking-tight text-orange-300 opacity-0"
                                >
                                    {{ __('page::home.hero.title') }}
                                </h2>

                                <div
                                    x-init="
                                        () => {
                                            motion.animate(
                                                $el,
                                                {
                                                    opacity: [0, 1],
                                                    y: [10, 0],
                                                },
                                                {
                                                    duration: 1,
                                                    ease: motion.easeOut,
                                                },
                                            )
                                        }
                                    "
                                >
                                    <p class="mb-4 font-light lg:text-xl">
                                        {{ __('page::home.hero.subtitle') }}
                                    </p>

                                    <p class="mb-8 font-bold text-orange-200">
                                        {{ __('page::home.hero.subtitle2') }}
                                    </p>

                                    <!-- List -->
                                    <ul
                                        role="list"
                                        class="my-7 space-y-5 border-t border-gray-200 pt-8"
                                    >
                                        @foreach ([
                                                      'see_everyone',
                                                      'keep_discovering',
                                                      'talk_freely',
                                                      'real_time_users',
                                                      'more_features',
                                                  ] as $key)
                                            <li class="flex space-x-3">
                                                <!-- Icon -->
                                                <x-customtheme::icons.check-circle
                                                    class="h-5 w-5 flex-shrink-0 text-green-400"
                                                />

                                                <span
                                                    class="text-base leading-tight font-medium text-white"
                                                >
                                                    {{ __("page::home.hero.feature_list.{$key}") }}
                                                </span>
                                            </li>
                                        @endforeach
                                    </ul>

                                    @auth
                                        <p class="mb-4 font-light">
                                            You're signed in!
                                        </p>

                                        <a
                                            href="{{ route('protected.discover') }}"
                                            wire:navigate.hover
                                            class="inline-flex items-center rounded-lg bg-blue-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:bg-blue-500 dark:hover:bg-blue-500 dark:focus:ring-blue-800"
                                        >
                                            {{ __('page::home.hero.cta.discover') }}
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
                                                />
                                            </svg>
                                        </a>
                                    @else
                                        <a
                                            href="{{ route('register') }}"
                                            wire:navigate.hover
                                            class="inline-flex items-center rounded-full bg-blue-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:bg-blue-500 dark:hover:bg-blue-500 dark:focus:ring-blue-800"
                                        >
                                            {{ __('page::home.hero.cta.register') }}
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
                                                />
                                            </svg>
                                        </a>
                                    @endauth
                                </div>
                            </div>

                            <x-flowbite::svg.matches-talking-on-desktop
                                x-init="
                        () => {
                            motion.animate(
                                $el,
                                {
                                    opacity: [0, 1],
                                    x: [10, 0],
                                },
                                {
                                    duration: 1,
                                    ease: motion.easeOut,
                                },
                            )
                        }
                    "
                                class="l:mt-0 mt-8 mb-4 w-auto w-full text-gray-800 opacity-0 lg:mb-0 lg:flex dark:text-white"
                            />
                        </div>

                        <!-- Row -->
                        <div
                            class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16"
                        >
                            <x-flowbite::svg.couple-dancing-music
                                x-init="
                    () => {
                        motion.animate(
                            $el,
                            {
                                opacity: [0, 1],
                                x: [-10, 0],
                            },
                            {
                                duration: 1,
                                ease: motion.easeOut,
                            },
                        )
                    }
                "
                                class="mb-4 hidden w-auto w-full text-gray-800 opacity-0 lg:mb-0 lg:flex dark:text-white"
                            />

                            <div
                                class="text-gray-500 sm:text-lg dark:text-gray-400"
                            >
                                <h2
                                    x-init="
                                        () => {
                                            motion.animate(
                                                $el,
                                                {
                                                    opacity: [0, 1],
                                                    x: [10, 0],
                                                },
                                                {
                                                    duration: 1,
                                                    ease: motion.easeOut,
                                                },
                                            )
                                        }
                                    "
                                    class="dark mb-4 text-4xl font-extrabold tracking-tight text-orange-300"
                                >
                                    {{ __('page::home.what_is_asked.heading') }}
                                </h2>

                                <div
                                    x-init="
                                        () => {
                                            motion.animate(
                                                $el,
                                                {
                                                    opacity: [0, 1],
                                                    y: [10, 0],
                                                },
                                                {
                                                    duration: 1,
                                                    ease: motion.easeOut,
                                                },
                                            )
                                        }
                                    "
                                    class="opacity-0"
                                >
                                    <p
                                        class="mb-8 font-light text-slate-50 lg:text-xl"
                                    >
                                        {{ __('page::home.what_is_asked.description') }}
                                    </p>
                                    <!-- List -->
                                    <ul
                                        role="list"
                                        class="my-7 space-y-5 border-t border-gray-200 pt-8"
                                    >
                                        @foreach (['daily_checkin', 'passkey', 'flag_accounts', 'be_honest'] as $item)
                                            <li class="flex space-x-3">
                                                <!-- Icon -->
                                                <x-customtheme::icons.check-circle
                                                    class="h-5 w-5 text-green-400"
                                                />

                                                <span
                                                    class="text-base leading-tight font-medium text-white"
                                                >
                                                    {{ __("page::home.what_is_asked.list.{$item}") }}
                                                </span>
                                            </li>
                                        @endforeach
                                    </ul>

                                    <a
                                        class="inline-flex items-center rounded-full bg-blue-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:bg-blue-500 dark:hover:bg-blue-500 dark:focus:ring-blue-800"
                                    >
                                        {{ __('page::home.what_is_asked.more_info') }}
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
                                            />
                                        </svg>
                                    </a>
                                    <!-- <p class="font-light lg:text-xl">If this is your first time trying online dating, you came to the right spot.</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="flex items-center justify-center px-4 pt-30 pb-6 sm:px-0 lg:py-0"
                >
                    <div
                        x-init="
                            () => {
                                motion.inView($el, (element) => {
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
                                })
                            }
                        "
                        class="max-w-md opacity-0 xl:max-w-xl"
                    >
                        <div
                            class="transition duration-200 ease-in-out will-change-transform group-hover:-translate-x-1"
                        >
                            <h1
                                class="mb-4 bg-clip-text text-3xl leading-none font-extrabold tracking-tight text-transparent xl:text-5xl"
                                style="
                                    background-image: linear-gradient(
                                        90deg,
                                        #f6ad55 0%,
                                        white 35%,
                                        #f6ad55 70%
                                    );
                                    background-size: 200% 100%;
                                    animation: shine 2s linear infinite;
                                "
                            >
                                {{ __('page::home.community.heading') }}
                            </h1>

                            {{-- Heart 1 --}}
                            <div
                                class="absolute top-0 origin-center"
                                style="
                                    opacity: 1;
                                    transform: translateX(1px) translateY(-40px);
                                "
                                aria-hidden="true"
                            >
                                <x-customtheme::icons.heart
                                    class="size-[29px] text-red-400"
                                />
                            </div>

                            {{-- Heart 2 --}}
                            <div
                                class="absolute top-0 origin-center"
                                style="
                                    opacity: 1;
                                    transform: translateX(20px)
                                        translateY(-80px) rotate(20deg);
                                "
                                aria-hidden="true"
                            >
                                <x-customtheme::icons.heart
                                    class="size-[27px] text-red-400"
                                />
                            </div>

                            {{-- Heart 3 --}}
                            <div
                                class="absolute top-0 origin-center"
                                style="
                                    opacity: 1;
                                    transform: translateX(-10px)
                                        translateY(-70px) rotate(-20deg);
                                "
                                aria-hidden="true"
                            >
                                <x-customtheme::icons.heart
                                    class="size-[25px] text-red-400"
                                />
                            </div>
                        </div>

                        <p
                            class="mb-4 font-light text-orange-200 lg:mb-8 xl:text-2xl"
                        >
                            {{ __('page::home.community.testimonials_cta') }}
                            <a
                                href="{{ route('testimonials.index') }}"
                                wire:navigate.hover
                                class="inline-flex items-center font-medium text-white hover:underline"
                            >
                                {{ __('page::home.community.testimonials_click') }}
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

                        <div
                            id="testimonial-carousel"
                            class="relative"
                            data-carousel="slide"
                        >
                            <div
                                class="relative mx-auto h-52 max-w-screen-md overflow-x-hidden overflow-y-visible rounded-lg sm:h-48"
                            >
                                <livewire:testimonial::home-carousel-component />
                            </div>
                            <div class="mb-10 flex items-center justify-center">
                                <button
                                    type="button"
                                    class="group mr-4 flex h-full cursor-pointer items-center justify-center focus:outline-none"
                                    data-carousel-prev
                                >
                                    <span
                                        class="text-white hover:text-gray-700 dark:hover:text-gray-200"
                                    >
                                        <svg
                                            class="h-6 w-6"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                                                clip-rule="evenodd"
                                            ></path>
                                        </svg>
                                        <span class="hidden">
                                            {{ __('page::home.community.testimonials_previous') }}
                                        </span>
                                    </span>
                                </button>
                                <button
                                    type="button"
                                    class="group flex h-full cursor-pointer items-center justify-center focus:outline-none"
                                    data-carousel-next
                                >
                                    <span
                                        class="text-white hover:text-gray-700 dark:hover:text-gray-200"
                                    >
                                        <svg
                                            class="h-6 w-6"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                                clip-rule="evenodd"
                                            ></path>
                                        </svg>
                                        <span class="hidden">
                                            {{ __('page::home.community.testimonials_next') }}
                                        </span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-8 lg:py-16">
            <div
                x-init="
                    () => {
                        motion.inView($el, (element) => {
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
                        })
                    }
                "
                class="mx-auto mb-8 w-full max-w-5xl px-4 text-center opacity-0 md:mb-16 lg:px-0 xl:max-w-7xl 2xl:max-w-[90rem]"
            >
                <h2
                    class="mb-4 text-3xl font-extrabold tracking-tight text-white md:text-4xl"
                >
                    {{ __('page::home.transparency.heading') }}
                </h2>

                <div>
                    <a
                        href="{{ route('statistics') }}"
                        wire:navigate.hover
                        class="inline-flex items-center rounded-full bg-blue-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:bg-blue-500 dark:hover:bg-blue-500 dark:focus:ring-blue-800"
                    >
                        Click here for more information
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
            <dl
                x-init="
                    () => {
                        motion.inView($el, (element) => {
                            motion.animate(
                                Array.from($el.children),
                                {
                                    y: [10, 0],
                                    opacity: [0, 1],
                                },
                                {
                                    duration: 0.7,
                                    ease: motion.backOut,
                                    delay: motion.stagger(0.1),
                                },
                            )
                        })
                    }
                "
                class="mx-auto mt-8 grid max-w-screen-xl grid-cols-2 gap-8 text-white sm:grid-cols-3 lg:mt-14 xl:grid-cols-6"
            >
                @foreach ([
                              'unique_users',
                              'active_now',
                              'inactive_removed',
                              'matches_total',
                              'matches_today',
                              'organizations',
                          ] as $stat)
                    <div
                        class="flex flex-col items-center justify-center opacity-0"
                    >
                        <dt
                            class="mb-2 text-3xl font-extrabold md:text-4xl"
                            id="{{ Str::camel($stat) }}"
                        >
                            0
                        </dt>
                        <dd class="font-light text-gray-500 dark:text-gray-400">
                            {{ __("page::home.transparency.stats.{$stat}") }}
                        </dd>
                    </div>
                @endforeach
            </dl>
        </section>
    @endif
</div>
