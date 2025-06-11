<x-customtheme::page-layouts.page-with-image-banner
    :title="__('Donations')"
    :description="__(':company is wholly dependent on the dedication of its maintainers and contributors, <br> who volunteer their free time to ensure its continued development and improvement.', ['company' => config('app.name')])"
>
    <x-slot name="body">

        <h2 class="text-2xl font-bold">Introduction and motivation</h2>

        <p>Hello, my name is Jonas Vanderhaegen, {{ floor(Carbon\Carbon::createFromFormat('Y-m-d','1991-04-23')->diffInYears()) }} years old, live by myself. I'm a web developer with 10+ years of experience. My parents are my age + 30 years. My grandmother lives in a elderly home. My sister lives with her boyfriend and they have 2 children.</p>

        <p>Some day my parents will want to live in a nice elderly home or God forbid, something happens to their mental and/or physical health at a later age. Unfortunately this can get quite expensive in Belgium. With your financial support as a token of gratitude I'll be able to support my family better when that time comes, gift them nice things and experiences.</p>

        <h2 class="text-2xl font-bold">Dating experience</h2>

        <p>I've experience with using multiple dating apps. I've watched many Youtubers draw the same negative conclusions which also brought me interesting perspectives I didn't think of.</p>

        <p>I truly hope by taking a different approach people will appreciate the changes, find their person, leave a positive testimonial and recommend this dating platform to friends and family.</p>

        <p>If anyone has critical feedback on my dating platform <a class="text-blue-500 dark:text-blue-400" href="{{route('contact.create')}}" wire:navigate.hover>feel free to use the contact form</a>

        <h2 class="text-2xl font-bold">Improvement an dedication on this project</h2>

        <p>
            As we prioritize our paid client work to sustain ourselves, your
            support through donations and sponsorships helps us devote more time
            to the project.
        </p>

        <p class="mb-8">
            We realize that not everyone is able to contribute of their time to
            support with responding to tickets or contributing features and
            bugfixes. We are open to contributions of financial support and
            provide the following ways you can contribute:
        </p>

        <div class="mb-8 justify-between gap-4 lg:flex">
            <a
                href="/newsletter"
                data-pan="support-page-open-collective-anchor-block"
                class="opcgroup dark:hover:ring-cloud relative z-0 mb-4 flex items-center gap-6 overflow-hidden rounded-2xl bg-cyan-50/50 py-5 pr-7 pl-6 ring-1 ring-black/5 transition duration-300 ease-in-out hover:bg-cyan-50 hover:ring-black/10 md:max-w-lg lg:mb-0 dark:bg-slate-700 dark:hover:bg-slate-800"
            >
                {{-- Decorative circle --}}
                <div
                    class="absolute top-1/2 left-3 -z-10 size-16 -translate-y-1/2 rounded-full bg-cyan-400/60 blur-2xl dark:block"
                    aria-hidden="true"
                ></div>

                {{-- Content --}}
                <div class="flex items-center gap-5 text-sm">
                    <div class="flex flex-col items-center gap-2">
                        {{-- Icon --}}
                        <x-customtheme::icons.opencollective
                            class="size-7 shrink-0 text-cyan-400"
                        />

                        {{-- Title --}}
                        <h2
                            class="transition duration-300 will-change-transform group-hover:scale-105"
                        >
                            OpenCollective
                        </h2>
                    </div>

                    {{-- Message --}}
                    <p
                        class="leading-relaxed opacity-50 transition duration-300 will-change-transform group-hover:translate-x-0.5"
                    >
                        Open Collective enables all kinds of groups to raise,
                        manage, and spend money transparently.
                    </p>
                </div>

                {{-- Right arrow --}}
                <x-customtheme::icons.right-arrow
                    x-init="
                        () => {
                            motion.animate(
                                $el,
                                {
                                    x: [0, 10],
                                },
                                {
                                    repeat: Infinity,
                                    repeatType: 'reverse',
                                    type: 'spring',
                                    stiffness: 100,
                                    damping: 20
                                },
                            )
                        }
                    "
                    class="size-4 shrink-0"
                />
            </a>

            <a
                href="/newsletter"
                class="opcgroup dark:hover:ring-cloud relative z-0 flex items-center gap-6 overflow-hidden rounded-2xl bg-cyan-50/50 py-5 pr-7 pl-6 ring-1 ring-black/5 transition duration-300 ease-in-out hover:bg-cyan-50 hover:ring-black/10 md:max-w-lg dark:bg-slate-700 dark:hover:bg-slate-800"
            >
                {{-- Decorative circle --}}
                <div
                    class="absolute top-1/2 left-3 -z-10 size-16 -translate-y-1/2 rounded-full bg-cyan-400/60 blur-2xl dark:block"
                    aria-hidden="true"
                ></div>

                {{-- Content --}}
                <div class="flex items-center gap-5 text-sm">
                    <div class="flex flex-col items-center gap-2">
                        {{-- Icon --}}
                        <x-customtheme::icons.email-document
                            class="size-7 shrink-0"
                        />

                        {{-- Title --}}
                        <h2
                            class="transition duration-300 will-change-transform group-hover:scale-105"
                        >
                            Personal
                        </h2>
                    </div>

                    {{-- Message --}}
                    <p
                        class="leading-relaxed opacity-50 transition duration-300 will-change-transform group-hover:translate-x-0.5"
                    >
                        To make a direct donation via bank transfer, please use
                        the following details and include your name or
                        organization in the reference line so we can properly
                        acknowledge your gift.
                    </p>
                </div>

                {{-- Right arrow --}}
                <x-customtheme::icons.right-arrow
                    x-init="
                        () => {
                            motion.animate(
                                $el,
                                {
                                    x: [0, 10],
                                },
                                {
                                    repeat: Infinity,
                                    repeatType: 'reverse',
                                    type: 'spring',
                                    stiffness: 100,
                                    damping: 20
                                },
                            )
                        }
                    "
                    class="size-4 shrink-0"
                />
            </a>
        </div>

        <p>
            All contributions are welcome, at any amount, as a one-off payment
            or on a recurring schedule.
        </p>

        <p>
            All monthly sponsors above $10/month will be bestowed the Sponsor
            role on our Discord.
        </p>

        <p>
            Your contributions help cover the costs of development,
            infrastructure, and community initiatives. Even a small donation
            goes a long way in defraying the expenses of working for free to
            keep this project alive and thriving.
        </p>

        <p class="mb-8">
            Together, we can continue to grow and ensure it remains a valuable
            tool for the community.
        </p>

        <h2 class="text-2xl">Goals</h2>

        <p class="mb-8">
            When you donate to our project, here’s exactly where your money will
            go and how it helps us build a better dating platform.
        </p>

        <ol
            class="relative space-y-10 border-s border-gray-200 dark:border-gray-700"
        >
            <li class="ms-6">
                <span
                    class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-blue-100 ring-8 ring-white dark:bg-blue-500 dark:ring-gray-900"
                >
                    <svg
                        class="h-2.5 w-2.5 text-blue-800 dark:text-blue-300"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                    >
                        <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"
                        />
                    </svg>
                </span>
                <h3
                    class="mb-1 text-lg font-semibold text-gray-900 dark:text-white"
                >
                    Infrastructure and Hosting
                </h3>
                <p
                    class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400"
                >
                    Covering server costs, content delivery, backups and
                    security certificates so the site stays fast and reliable.
                    Especially storage expansion.
                </p>
            </li>

            <!-- 1. User Verification -->
            <li class="ms-6">
                <span
                    class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-blue-100 ring-8 ring-white dark:bg-blue-500 dark:ring-gray-900"
                >
                    <svg
                        class="h-2.5 w-2.5 text-blue-800 dark:text-blue-300"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                    >
                        <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"
                        />
                    </svg>
                </span>
                <h3
                    class="mb-1 text-lg font-semibold text-gray-900 dark:text-white"
                >
                    Implementations to verify user’s authenticity like itsme and
                    government tools
                </h3>
                <p
                    class="text-base font-normal text-gray-500 dark:text-gray-400"
                >
                    Ensure every profile is genuine by integrating secure logins
                    via itsme or eID. This prevents fake accounts and builds
                    trust across our community.
                </p>
            </li>

            <!-- 2. Extra Developers -->
            <li class="ms-6">
                <span
                    class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-blue-100 ring-8 ring-white dark:bg-blue-500 dark:ring-gray-900"
                >
                    <svg
                        class="h-2.5 w-2.5 text-blue-800 dark:text-blue-300"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                    >
                        <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"
                        />
                    </svg>
                </span>
                <h3
                    class="mb-1 text-lg font-semibold text-gray-900 dark:text-white"
                >
                    Hire extra developers
                </h3>
                <p
                    class="text-base font-normal text-gray-500 dark:text-gray-400"
                >
                    Bring on more developers to speed up feature delivery,
                    squash bugs, and keep the site running smoothly as our user
                    base grows.
                </p>
            </li>

            <!-- 3. Face-to-Face Events -->
            <li class="ms-6">
                <span
                    class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-blue-100 ring-8 ring-white dark:bg-blue-500 dark:ring-gray-900"
                >
                    <svg
                        class="h-2.5 w-2.5 text-blue-800 dark:text-blue-300"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                    >
                        <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"
                        />
                    </svg>
                </span>
                <h3
                    class="mb-1 text-lg font-semibold text-gray-900 dark:text-white"
                >
                    Organize Face-to-face events
                </h3>
                <p
                    class="text-base font-normal text-gray-500 dark:text-gray-400"
                >
                    Host group dinners, speed-dating sessions, and coffee
                    meetups in local venues so members can connect in person and
                    feel the real chemistry.
                </p>
            </li>

            <!-- 4. Legal and Admin Support -->
            <li class="ms-6">
                <span
                    class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-blue-100 ring-8 ring-white dark:bg-blue-500 dark:ring-gray-900"
                >
                    <svg
                        class="h-2.5 w-2.5 text-blue-800 dark:text-blue-300"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                    >
                        <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"
                        />
                    </svg>
                </span>
                <h3
                    class="mb-1 text-lg font-semibold text-gray-900 dark:text-white"
                >
                    Legal and administrative support
                </h3>
                <p
                    class="text-base font-normal text-gray-500 dark:text-gray-400"
                >
                    Work with legal and admin experts to draft contracts,
                    privacy policies, and ensure full compliance with all
                    regulations.
                </p>
            </li>

            <!-- 5. Advanced Matching Features -->
            <li class="ms-6">
                <span
                    class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-blue-100 ring-8 ring-white dark:bg-blue-500 dark:ring-gray-900"
                >
                    <svg
                        class="h-2.5 w-2.5 text-blue-800 dark:text-blue-300"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                    >
                        <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"
                        />
                    </svg>
                </span>
                <h3
                    class="mb-1 text-lg font-semibold text-gray-900 dark:text-white"
                >
                    More features that will help finding your ideal match
                </h3>
                <p
                    class="text-base font-normal text-gray-500 dark:text-gray-400"
                >
                    Introduce smart filters, personality quizzes, and detailed
                    search options to make matching with your perfect partner
                    easier.
                </p>
            </li>

            <!-- 6. Volunteer Matchmakers & Coaches -->
            <li class="ms-6">
                <span
                    class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-blue-100 ring-8 ring-white dark:bg-blue-500 dark:ring-gray-900"
                >
                    <svg
                        class="h-2.5 w-2.5 text-blue-800 dark:text-blue-300"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                    >
                        <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"
                        />
                    </svg>
                </span>
                <h3
                    class="mb-1 text-lg font-semibold text-gray-900 dark:text-white"
                >
                    Volunteering human matchmakers and dating coaches
                </h3>
                <p
                    class="text-base font-normal text-gray-500 dark:text-gray-400"
                >
                    Offer volunteer matchmakers and professional coaches who
                    review profiles, guide conversations, and boost your
                    confidence.
                </p>
            </li>

            <!-- 7. Mobile Apps -->
            <li class="ms-6">
                <span
                    class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-blue-100 ring-8 ring-white dark:bg-blue-500 dark:ring-gray-900"
                >
                    <svg
                        class="h-2.5 w-2.5 text-blue-800 dark:text-blue-300"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                    >
                        <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"
                        />
                    </svg>
                </span>
                <h3
                    class="mb-1 text-lg font-semibold text-gray-900 dark:text-white"
                >
                    Mobile apps
                </h3>
                <p
                    class="text-base font-normal text-gray-500 dark:text-gray-400"
                >
                    Develop intuitive iOS and Android apps so you can connect,
                    chat, and discover matches anytime, anywhere.
                </p>
            </li>
        </ol>
    </x-slot>

    <x-slot name="aside">
        <x-customtheme::page-partials.page-with-image-banner.right-sidebar-placeholder />
    </x-slot>
</x-customtheme::page-layouts.page-with-image-banner>
