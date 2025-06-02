<div>
    @if ($isMobile ?? false)
        <section class="bg-white dark:bg-gray-900">
            <x-flowbite::boxed-width class="pt-8 text-center">
                <x-slot name="body">
                    <h1
                        class="mb-4 text-4xl leading-none font-extrabold tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white"
                    >
                        We invest in the world’s potential
                    </h1>

                    <p
                        class="mb-8 font-light text-gray-500 sm:px-16 md:text-lg lg:text-xl xl:px-48 dark:text-gray-400"
                    >
                        Here at Flowbite we focus on markets where technology,
                        innovation, and capital can unlock long-term value and
                        drive economic growth.
                    </p>

                    <div
                        class="mb-8 flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4 lg:mb-16"
                    >
                        <a
                            href="{{ route('register') }}"
                            wire:navigate.hover
                            class="inline-flex items-center justify-center rounded-lg bg-blue-700 px-5 py-3 text-center text-base font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900"
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
                class="z-2 -mt-48 -mb-5 bg-pink-200 pt-48 pb-10 sm:-mt-80 sm:pt-80 lg:pb-16 dark:bg-gray-800"
            >
                <x-flowbite::boxed-width class="mt-8 text-center">
                    <x-slot name="body">
                        <h2
                            class="mb-4 text-4xl font-extrabold tracking-tight text-white"
                        >
                            Testimonials
                        </h2>
                        <p
                            class="font-light text-pink-500 sm:text-xl dark:text-gray-400"
                        >
                            Explore the whole collection of open-source web
                            components and elements built with the utility
                            classes from Tailwind
                        </p>
                        <div
                            id="testimonial-carousel"
                            class="relative"
                            data-carousel="slide"
                        >
                            <div
                                class="relative mx-auto h-52 max-w-screen-md overflow-x-hidden overflow-y-visible rounded-lg sm:h-48"
                            >
                                <figure
                                    class="mx-auto hidden w-full max-w-screen-md"
                                    data-carousel-item
                                >
                                    <blockquote>
                                        <p
                                            class="text-lg font-medium text-pink-500 sm:text-2xl dark:text-white"
                                        >
                                            "Flowbite is just awesome. It
                                            contains tons of predesigned
                                            components and pages starting from
                                            login screen to complex dashboard.
                                            Perfect choice for your next SaaS
                                            application."
                                        </p>
                                    </blockquote>
                                    <figcaption
                                        class="mt-6 flex items-center justify-center space-x-3"
                                    >
                                        <img
                                            class="h-6 w-6 rounded-full"
                                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png"
                                            alt="profile picture"
                                        />
                                        <div
                                            class="flex items-center divide-x-2 divide-pink-300 dark:divide-gray-700"
                                        >
                                            <div
                                                class="pr-3 font-medium text-pink-400 dark:text-white"
                                            >
                                                Bonnie Green
                                            </div>
                                            <div
                                                class="pl-3 text-sm font-light text-pink-400 dark:text-gray-400"
                                            >
                                                Web developer at Google
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                                <figure
                                    class="mx-auto hidden w-full max-w-screen-md"
                                    data-carousel-item
                                >
                                    <blockquote>
                                        <p
                                            class="text-lg font-medium text-pink-500 sm:text-2xl dark:text-white"
                                        >
                                            "As someone who mainly designs in
                                            the browser, I've been a casual user
                                            of Figma, but as soon as I saw and
                                            started playing with FlowBite my
                                            mind was blown and became so
                                            productive."
                                        </p>
                                    </blockquote>
                                    <figcaption
                                        class="mt-6 flex items-center justify-center space-x-3"
                                    >
                                        <img
                                            class="h-6 w-6 rounded-full"
                                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/helene-engels.png"
                                            alt="profile picture"
                                        />
                                        <div
                                            class="flex items-center divide-x-2 divide-pink-300 dark:divide-gray-700"
                                        >
                                            <div
                                                class="pr-3 font-medium text-pink-400 dark:text-white"
                                            >
                                                Helene Engels
                                            </div>
                                            <div
                                                class="pl-3 text-sm font-light text-pink-400 dark:text-gray-400"
                                            >
                                                Creative designer at Adobe
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>

                                <figure
                                    class="mx-auto hidden w-full max-w-screen-md"
                                    data-carousel-item
                                >
                                    <blockquote>
                                        <p
                                            class="text-lg font-medium text-pink-500 sm:text-2xl dark:text-white"
                                        >
                                            "Flowbite has code in one place and
                                            I'm not joking when I say it took me
                                            a matter of minutes to copy the
                                            code, customise it and integrate
                                            within a Laravel + Vue application."
                                        </p>
                                    </blockquote>
                                    <figcaption
                                        class="mt-6 flex items-center justify-center space-x-3"
                                    >
                                        <img
                                            class="h-6 w-6 rounded-full"
                                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/neil-sims.png"
                                            alt="profile picture"
                                        />
                                        <div
                                            class="flex items-center divide-x-2 divide-pink-300 dark:divide-gray-700"
                                        >
                                            <div
                                                class="pr-3 font-medium text-pink-400 dark:text-white"
                                            >
                                                Neil Sims
                                            </div>
                                            <div
                                                class="pl-3 text-sm font-light text-pink-400 dark:text-gray-400"
                                            >
                                                CTO at Microsoft
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="flex items-center justify-center">
                                <button
                                    type="button"
                                    class="group mr-4 flex h-full cursor-pointer items-center justify-center focus:outline-none"
                                    data-carousel-prev
                                >
                                    <span
                                        class="text-pink-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200"
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
                                        class="text-pink-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200"
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
        </section>
    @else
        <section class="bg-white dark:bg-gray-900">
            <div
                class="mx-auto grid max-w-screen-xl px-4 py-8 lg:grid-cols-12 lg:gap-12 lg:py-16 xl:gap-0"
            >
                <div
                    class="mr-auto place-self-center lg:col-span-7 xl:col-span-8"
                >
                    <h1
                        class="mb-4 max-w-2xl text-4xl leading-none font-extrabold tracking-tight md:text-5xl xl:text-6xl dark:text-white"
                    >
                        Building digital products & brands.
                    </h1>
                    <p
                        class="mb-6 max-w-2xl font-light text-gray-500 md:text-lg lg:mb-8 lg:text-xl dark:text-gray-400"
                    >
                        Here at flowbite we focus on markets where technology,
                        innovation, and capital can unlock long-term value and
                        drive economic growth.
                    </p>
                    <form action="#" class="">
                        <div class="mb-3 flex items-center">
                            <div class="relative mr-3 w-auto">
                                <label
                                    for="member_email"
                                    class="mb-2 hidden text-sm font-medium text-gray-900 dark:text-gray-300"
                                >
                                    Email address
                                </label>
                                <div
                                    class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3"
                                >
                                    <svg
                                        class="h-5 w-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"
                                        ></path>
                                        <path
                                            d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"
                                        ></path>
                                    </svg>
                                </div>
                                <input
                                    class="focus:ring-primary-500 focus:border-primary-500 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-3 pl-10 text-sm text-gray-900 md:w-96 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                    placeholder="Enter your email"
                                    type="email"
                                    name="member[email]"
                                    id="member_email"
                                    required=""
                                />
                            </div>
                            <div>
                                <input
                                    type="submit"
                                    value="Try for free"
                                    class="bg-primary-700 hover:bg-primary-800 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 cursor-pointer rounded-lg px-5 py-3 text-center text-sm font-medium text-white focus:ring-4"
                                    name="member_submit"
                                    id="member_submit"
                                />
                            </div>
                        </div>
                        <div
                            class="text-left text-sm text-gray-500 dark:text-gray-300"
                        >
                            Instant signup. No credit card required.
                            <a
                                href="#"
                                class="text-primary-600 dark:text-primary-500 hover:underline"
                            >
                                Terms of Service
                            </a>
                            and
                            <a
                                class="text-primary-600 dark:text-primary-500 hover:underline"
                                href="#"
                            >
                                Privacy Policy
                            </a>
                            .
                        </div>
                    </form>
                </div>
                <div class="hidden lg:col-span-5 lg:mt-0 lg:flex xl:col-span-4">
                    <img
                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/hero/mobile-app.svg"
                        alt="phone illustration"
                    />
                </div>
            </div>
        </section>
    @endif
</div>
