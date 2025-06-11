<div>
    <section class="text-slate-50">
        <div class="grid lg:grid-cols-2">
            <div
                class="flex items-center justify-center px-4 py-6 lg:py-0 ps-4 md:ps-4 lg:ps-6 2xl:ps-12"
            >
                <div
                    class="mx-auto max-w-screen-xl space-y-12 py-8 sm:py-16 lg:space-y-20"
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
                                        class="inline-flex items-center rounded-full bg-blue-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:bg-blue-500 dark:hover:bg-blue-500 dark:focus:ring-blue-800"
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
                            class="l:mt-0 mt-8 mb-4 w-auto w-full text-gray-800 opacity-0 lg:mb-0 dark:text-white"
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
                            class="mb-4 w-auto w-full text-gray-800 opacity-0 lg:mb-0 dark:text-white"
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
                                {{--
                                <p
                                    class="mb-8 font-light text-slate-50 lg:text-xl"
                                >
                                    {{ __('page::home.what_is_asked.description') }}
                                </p>
                                --}}

                                <div x-init="
                () =&gt; {
                    motion.inView(
                        $el,
                        (element) =&gt; {
                            motion.animate(
                                $el,
                                {
                                    opacity: [0, 1],
                                    x: [-50, 0],
                                },
                                {
                                    duration: 0.7,
                                    ease: motion.circOut,
                                },
                            )
                        },
                        {
                            amount: 0.5,
                        },
                    )
                }
            " class="opacity-0 will-change-transform" style="transform: none; opacity: 1;">
                                    <a href="{{route('support')}}" wire:navigate.hover class="text-white group  border-1 border-white/50 hover:border-white/80  flex flex-wrap items-center justify-center gap-x-5 gap-y-3 rounded-4xl  mb-4 px-8 py-8 transition duration-200 ease-in-out  md:justify-between md:px-12 md:py-10" aria-label="Learn about sponsoring this project">
                                        <div class="inline-flex shrink-0 flex-col-reverse items-center gap-x-5 gap-y-3 md:flex-row">
                                            <div class="space-y-2 text-2xl font-medium">
                                                <span>Want  </span>
                                                <span>your logo</span>
                                                <span>here?</span>
                                            </div>

                                        </div>
                                        <div class="text-center font-light opacity-50 md:max-w-xs md:text-left md:text-lg">
                                            Become a sponsor and display your logo on the website with a link to your site on majority of pages.
                                        </div>
                                    </a>
                                </div>

                                <!-- List -->
                                {{--
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
                                --}}

                                {{--
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
                                --}}
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
                                transform: translateX(20px) translateY(-80px)
                                    rotate(20deg);
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
                                transform: translateX(-10px) translateY(-70px)
                                    rotate(-20deg);
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
            class="mx-auto mt-8 grid max-w-screen-xl grid-cols-2 gap-8 text-white sm:grid-cols-3 lg:mt-14 xl:grid-cols-5"
        >
            @foreach ([
                          'unique_users',
                          'active_now',
                          'inactive_removed',
                          'matches_total',
                          'matches_today',
                      ] as $stat)
                <div
                    class="flex flex-col items-center justify-center opacity-0"
                >
                    <dt
                        class="mb-2 text-3xl font-extrabold md:text-4xl"
                        id="{{ Str::camel($stat) }}"
                    >
                        {{ fake()->numberBetween(100, 800)  }}
                    </dt>
                    <dd class="font-light text-slate-50">
                        {{ __("page::home.transparency.stats.{$stat}") }}
                    </dd>
                </div>
            @endforeach
        </dl>
    </section>
</div>
