<x-customtheme::page-layouts.page-with-image-banner
    :title="__('Onboarding process')"
    :description="__('Let\'s fullfil your profile and account before you can match people')"
    :image="false"
>
    <x-slot name="body">
        @if (auth()->user()->onboarding()->inProgress())
            <ol
                class="flex items-center text-center text-sm font-medium text-gray-500 sm:text-base dark:text-gray-400"
            >
                @foreach (auth()->user()->onboarding()->steps as $step)
                    <li
                        @class([
                            'flex items-center',
                            'sm:block' => $loop->last,
                            "after:content-[''] after:w-12 after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700" => ! $loop->last,
                            "text-green-600 dark:text-green-500 sm:after:content-[''] after:w-12" => $step->complete(),
                        ])
                    >
                        @if ($loop->last && ! $step->complete())
                            <div class="mr-2 sm:mx-auto sm:mb-2">
                                {{ $loop->iteration }}
                            </div>

                            @unless ($step->complete())
                                <a
                                    href="{{ $step->link }}"
                                    wire:navigate
                                    {{ $step->complete() ? 'disabled' : '' }}
                                >
                                    {{ $step->title }}
                                </a>
                            @else
                                {{ $step->title }}
                            @endunless
                        @else
                            <div
                                class="flex items-center after:mx-2 after:font-light after:text-gray-200 after:content-['/'] sm:block sm:after:hidden dark:after:text-gray-500"
                            >
                                @if ($step->complete())
                                    <svg
                                        class="mr-2 h-4 w-4 sm:mx-auto sm:mb-2 sm:h-6 sm:w-6"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"
                                        ></path>
                                    </svg>
                                @else
                                    <div class="mr-2 sm:mx-auto sm:mb-2">
                                        {{ $loop->iteration }}
                                    </div>
                                @endif
                                @unless ($step->complete())
                                    <a
                                        href="{{ $step->link }}"
                                        wire:navigate
                                        {{ $step->complete() ? 'disabled' : '' }}
                                    >
                                        {{ $step->title }}
                                    </a>
                                @else
                                    {{ $step->title }}
                                @endunless
                            </div>
                        @endif
                    </li>
                @endforeach
            </ol>
        @endif
            <section class="py-8 antialiased md:py-8 border-t border-slate-300 dark:border-slate-700">
                    {{ $slot }}
            </section>
    </x-slot>

</x-customtheme::page-layouts.page-with-image-banner>
