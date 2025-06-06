<footer aria-labelledby="footer-heading">
    <x-flowbite::boxed-width class="pt-20 pb-5 text-slate-400">
        <x-slot name="body">
            <h2 id="footer-heading" class="sr-only">Footer</h2>
            <div
                class="flex flex-col flex-wrap items-center gap-x-6 gap-y-4 md:flex-row md:justify-between"
            >
                {{-- Left side --}}
                <div class="flex flex-col items-center gap-6 md:items-start">
                    {{-- Logo --}}
                    <div
                        x-init="
                            () => {
                                motion.inView($el, (element) => {
                                    motion.animate(
                                        $el,
                                        {
                                            opacity: [0, 1],
                                            x: [-10, 0],
                                        },
                                        {
                                            duration: 0.7,
                                            ease: motion.circOut,
                                        },
                                    )
                                })
                            }
                        "
                        class="opacity-0"
                    >
                        <a
                            href="{{ route('home') }}"
                            wire:navigate.hover
                            class="font-ultrabold h-6 uppercase transition duration-200 will-change-transform hover:scale-[1.02]"
                            aria-label="NativePHP homepage"
                        >
                            FreeDating

                            <span class="sr-only">
                                {{ config('app.name') }} homepage
                            </span>
                        </a>
                    </div>
                    {{-- Social links --}}
                    <nav
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
                        class="flex flex-wrap items-center justify-center gap-2.5 *:opacity-0"
                        aria-label="Social networks"
                    >
                        <x-customtheme::body-partials.footer.social-networks-all />
                    </nav>
                </div>

                {{-- Newsletter --}}
                <div
                    class="opacity-0"
                    x-init="
                        () => {
                            motion.inView($el, (element) => {
                                motion.animate(
                                    $el,
                                    {
                                        opacity: [0, 1],
                                        x: [10, 0],
                                    },
                                    {
                                        duration: 0.7,
                                        ease: motion.circOut,
                                    },
                                )
                            })
                        }
                    "
                >
                    <a
                        data-pan="footer-block-studio-boris"
                        href="https://studioboris.be"
                        class="opcgroup dark:hover:ring-cloud relative z-0 flex items-center gap-6 overflow-hidden rounded-4xl bg-transparent py-5 pr-7 pl-6 ring-1 ring-black/5 transition duration-300 ease-in-out hover:bg-gray-700 hover:ring-black/10 md:max-w-lg"
                    >
                        {{-- Decorative circle --}}
                        <div
                            class="absolute top-1/2 left-3 -z-10 size-16 -translate-y-1/2 rounded-full bg-lime-400/60 blur-2xl dark:block"
                            aria-hidden="true"
                        ></div>

                        {{-- Content --}}
                        <div class="flex items-center gap-5 text-sm">
                            <div
                                class="flex items-center rounded-lg bg-white p-3"
                            >
                                {{-- Icon --}}
                                <img
                                    alt="Studio Boris"
                                    loading="lazy"
                                    width="220"
                                    height="60"
                                    decoding="async"
                                    data-nimg="1"
                                    style="color: transparent"
                                    src="{{ asset('assets/studio-boris.svg') }}"
                                />
                            </div>

                            {{-- Message --}}
                            <p
                                class="leading-relaxed text-white transition duration-300 will-change-transform group-hover:translate-x-0.5"
                            >
                                helpt schrijvers en bedrijven om hun ideeën op
                                een heldere manier te verwoorden.
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
            </div>

            {{-- Divider --}}
            <div class="flex items-center pt-3 pb-3" aria-hidden="true">
                <div class="size-1.5 rotate-45 bg-slate-400"></div>
                <div class="h-0.5 w-full bg-slate-400"></div>
                <div class="size-1.5 rotate-45 bg-slate-400"></div>
            </div>

            {{-- Copyright --}}
            <section
                class="flex flex-col flex-wrap items-center gap-x-5 gap-y-3 text-center text-sm text-slate-400 md:flex-row md:justify-between md:text-left"
                aria-label="Credits and copyright information"
            >
                <div
                    x-init="
                        () => {
                            motion.inView($el, (element) => {
                                motion.animate(
                                    $el,
                                    {
                                        opacity: [0, 1],
                                        x: [-10, 0],
                                    },
                                    {
                                        duration: 0.7,
                                        ease: motion.circOut,
                                    },
                                )
                            })
                        }
                    "
                    class="flex flex-col flex-wrap items-center gap-2 opacity-0 md:flex-row"
                >
                    <div class="flex gap-1">
                        <div>{{ __('Website designed by') }}</div>
                        <a
                            href="https://skylence.be"
                            target="_blank"
                            class="group relative font-medium text-slate-50 transition duration-200 hover:text-white"
                            aria-label="Hassan's website"
                        >
                            Skylence
                            <div
                                class="absolute -bottom-0.5 left-0 h-px w-full origin-right scale-x-0 bg-current transition duration-300 ease-out will-change-transform group-hover:origin-left group-hover:scale-x-100"
                            ></div>
                        </a>
                    </div>
                    <div class="hidden h-3 w-0.5 bg-gray-500 md:block"></div>
                    <div class="flex gap-1">
                        <div>Shout-out for background at</div>
                        <a
                            href="https://www.worksmarter.be/"
                            target="_blank"
                            class="group relative font-medium text-slate-50 transition duration-200 hover:text-white"
                            aria-label="Caneco's Twitter profile"
                            rel="noopener noreferrer"
                        >
                            WorkSmarter
                        </a>
                    </div>
                </div>
                <div
                    x-init="
                        () => {
                            motion.inView($el, (element) => {
                                motion.animate(
                                    $el,
                                    {
                                        opacity: [0, 1],
                                        x: [10, 0],
                                    },
                                    {
                                        duration: 0.7,
                                        ease: motion.circOut,
                                    },
                                )
                            })
                        }
                    "
                    class="opacity-0"
                >
                    <span>© {{ date('Y') }} {{ __('Maintained by') }}</span>
                    <a
                        href="https://skylence.be"
                        target="_blank"
                        class="group relative font-medium text-slate-50 transition duration-200 hover:text-white"
                        aria-label="Marcel Pociot's Twitter profile"
                        rel="noopener noreferrer"
                    >
                        Skylence
                        <div
                            class="absolute -bottom-0.5 left-0 h-px w-full origin-right scale-x-0 bg-current transition duration-300 ease-out will-change-transform group-hover:origin-left group-hover:scale-x-100"
                        ></div>
                    </a>
                </div>
            </section>
        </x-slot>
    </x-flowbite::boxed-width>
</footer>
