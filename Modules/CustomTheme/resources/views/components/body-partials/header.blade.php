@props(['hasMenu' => false])
<div x-collapse x-show="!showDocsNavigation">
    @auth
        <x-customtheme::body-partials.header.top-menu-banner />
    @endauth

    @guest
        <x-customtheme::body-partials.header.eap-banner />
    @endguest
</div>

@unless ($isMobile)
    <nav
        class="sticky top-0 z-31 flex flex-col items-center justify-center"
        aria-label="Main Navigation"
    >
        <div
            :class="{
            'ring-gray-200/80 dark:ring-gray-800/50 bg-white/50 dark:bg-white/5 translate-y-3': scrolled || showDocsNavigation,
            'ring-transparent dark:bg-transparent': ! scrolled && ! showDocsNavigation,
        }"
            class="mx-auto flex w-full max-w-5xl items-center justify-between gap-5 rounded-full px-4 py-4 ring-1 backdrop-blur-md transition duration-200 ease-out xl:max-w-7xl 2xl:max-w-[90rem]"
        >
            {{-- Left side --}}
            <div class="flex items-center gap-3">
                {{-- Logo --}}
                <a
                    href="{{ route('home') }}"
                    wire:navigate.hover
                    aria-label="Homepage"
                    class=""
                >
                    <span class="h-4 min-[400px]:h-5 sm:h-6">Free dating</span>
                    <span class="sr-only">Free dating</span>
                </a>

                {{-- V1 Announcement --}}
                <a
                    href="https://github.com/orgs/NativePHP/discussions/547"
                    class="group relative z-0 hidden items-center overflow-hidden rounded-full bg-gray-200 px-2.5 py-1.5 text-xs transition duration-200 will-change-transform hover:scale-x-105 lg:inline-flex dark:bg-slate-800"
                    target="_blank"
                    aria-label="Read about NativePHP version 1 release"
                    title="Read the NativePHP v1 announcement"
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
                        class="absolute inset-0.5 rounded-full bg-violet-50 dark:bg-slate-950"
                        aria-hidden="true"
                    ></div>

                    <div
                        class="absolute bottom-0 left-1/2 h-1/3 w-4/5 -translate-x-1/2 rounded-full bg-orange-300 opacity-50 blur-md transition-all duration-500 dark:bg-fuchsia-300/30 dark:group-hover:h-2/3 dark:group-hover:opacity-100"
                        aria-hidden="true"
                    ></div>

                    <span class="relative inline-flex items-center gap-1">
                        <x-customtheme::icons.confetti
                            class="-mt-px size-3.5"
                            aria-hidden="true"
                        />
                        <span class="font-normal">alpha</span>
                        <span class="sr-only">
                            NativePHP version is in alpha - click to learn more
                        </span>
                    </span>
                </a>
            </div>

            {{-- Right side --}}
            <div class="flex items-center gap-3.5">
                {{-- Desktop menu --}}
                <div
                    class="flex items-center gap-3.5 text-sm"
                    aria-label="Primary navigation"
                >
                    {{-- Link --}}

                    <x-customtheme::body-partials.header.account />

                    {{-- Decorative circle --}}
                    <div
                        class="hidden size-[3px] rotate-45 rounded-sm bg-gray-400 transition duration-200 lg:block dark:opacity-60"
                        aria-hidden="true"
                    ></div>

                    {{-- Link --}}
                    <a
                        href="{{ route('home') }}"
                        wire:navigate.hover
                        class="relative bg-gradient-to-tr from-orange-600 to-orange-300 bg-clip-text font-medium text-transparent lg:block dark:from-orange-500 dark:to-white/80"
                        aria-label="Sponsor NativePHP"
                        title="Support NativePHP development"
                    >
                        Your support
                        <span class="sr-only">NativePHP on GitHub</span>

                        {{-- Line --}}
                        <div
                            x-init="
                                () => {
                                    motion.animate(
                                        $el,
                                        {
                                            x: [-5, 50],
                                            scaleX: [1, 2.5, 1],
                                            opacity: [0, 1, 1, 1, 0],
                                        },
                                        {
                                            duration: 1.8,
                                            repeat: Infinity,
                                            repeatType: 'reverse',
                                            ease: motion.easeInOut,
                                        },
                                    )
                                }
                            "
                            class="absolute -bottom-1 left-0 h-0.5 w-2 origin-left rounded-full bg-orange-400 will-change-transform dark:bg-orange-500"
                            aria-hidden="true"
                        ></div>

                        {{-- Blurry line --}}
                        <div
                            x-init="
                                () => {
                                    motion.animate(
                                        $el,
                                        {
                                            x: [-5, 50],
                                            scaleX: [1, 2.5, 1],
                                            opacity: [0, 1, 1, 1, 0],
                                        },
                                        {
                                            duration: 1.8,
                                            repeat: Infinity,
                                            repeatType: 'reverse',
                                            ease: motion.easeInOut,
                                        },
                                    )
                                }
                            "
                            class="absolute -bottom-1.5 left-0 h-8 w-2 origin-left rounded-full bg-gradient-to-t from-red-500 to-transparent blur-[9px] will-change-transform dark:blur-sm"
                            aria-hidden="true"
                        ></div>
                    </a>

                    {{-- Decorative circle --}}
                    <div
                        class="hidden size-[3px] rotate-45 rounded-sm bg-gray-400 transition duration-200 lg:block dark:opacity-60"
                        aria-hidden="true"
                    ></div>

                    <button
                        id="drawer-navigation-button"
                        type="button"
                        class="cursor-pointer transition duration-200"
                    >
                        <span class="">info</span>
                    </button>

                    {{-- Decorative circle --}}
                    <div
                        class="hidden size-[3px] rotate-45 rounded-sm bg-gray-400 transition duration-200 lg:block dark:opacity-60"
                        aria-hidden="true"
                    ></div>

                    {{-- Theme toggle --}}
                    <x-flowbite::dark-toggle />
                </div>
            </div>
        </div>
    </nav>
@endunless
