<main class="bg-slate-50 pb-16 antialiased lg:pb-24 dark:bg-gray-900">
    <header
        class="relative h-[460px] w-full bg-[url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/twcomponents/header.webp')] bg-cover bg-center bg-no-repeat xl:h-[537px]"
    >
        <div
            class="absolute top-20 left-1/2 mx-auto w-full max-w-5xl -translate-x-1/2 px-4 xl:top-1/2 xl:max-w-7xl xl:-translate-y-1/2 xl:px-0 2xl:max-w-[90rem]"
        >
            <h1
                class="mb-4 max-w-4xl text-2xl leading-none font-extrabold text-white sm:text-3xl lg:text-4xl"
            >
                Testimonials
            </h1>
            <p class="text-lg font-bold text-white">Everybody's testimonials</p>
        </div>
    </header>

    <div
        class="relative z-20 -m-36 mx-4 mx-auto flex w-full max-w-5xl justify-between rounded rounded-4xl bg-gradient-to-b from-white via-white to-slate-100 p-6 px-5 !pb-20 xl:-m-32 xl:mx-auto xl:max-w-7xl xl:p-9 2xl:max-w-[90rem] dark:from-gray-800 dark:via-gray-800 dark:to-gray-900"
    >
        <article
            class="format format-sm sm:format-base lg:format-lg format-blue dark:format-invert w-full max-w-none xl:w-[850px] 2xl:w-[980px]"
        >
            <div class="mb-8">
                {{ $testimonials->links() }}
                <x-settings::section-border />
            </div>

            <div class="space-y-8">
                @foreach ($testimonials as $testimonial)
                    <blockquote
                        class="text-xl font-semibold text-gray-900 italic dark:text-white"
                    >
                        <svg
                            class="mb-4 h-8 w-8 text-gray-400 dark:text-gray-600"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            viewBox="0 0 18 14"
                        >
                            <path
                                d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z"
                            />
                        </svg>
                        <p>{{ $testimonial->long }}</p>
                    </blockquote>
                    <figcaption
                        class="mt-6 flex items-center justify-start space-x-3 rtl:space-x-reverse"
                    >
                        <!-- <img class="w-6 h-6 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gouch.png"
                            alt="profile picture"> -->
                        <div
                            class="flex items-center divide-x-2 divide-gray-500 rtl:divide-x-reverse dark:divide-gray-700"
                        >
                            <cite
                                class="pe-3 font-medium text-gray-900 dark:text-white"
                            >
                                {{ $testimonial->firstname }}
                                @if ($testimonial->lastname)
                                        {{ $testimonial->last_initial }}.
                                @endif
                            </cite>
                            <cite
                                class="ps-3 text-sm text-gray-500 dark:text-gray-400"
                            >
                                @if ($testimonial->match)
                                    {{ __('Found a match in') }}
                                    {{ $testimonial->amount }}
                                    @if ($testimonial->time === 'h')
                                        {{ $testimonial->amount === 1 ? __('hour') : __('hours') }}
                                    @else
                                        {{ $testimonial->amount === 1 ? __('day') : __('days') }}
                                    @endif
                                @else
                                    {{ __('Perhaps still searching') }}
                                @endif
                            </cite>
                        </div>
                    </figcaption>
                    <x-settings::section-border />
                @endforeach
            </div>

            <div class="">
                {{ $testimonials->links() }}
            </div>
        </article>
        <aside class="hidden xl:block" aria-labelledby="sidebar-label">
            <div class="sticky top-25 xl:w-[336px]">
                <h3 id="sidebar-label" class="sr-only">Sidebar</h3>

                <div class="mb-12">
                    <h4
                        class="mb-4 text-sm font-bold text-gray-900 uppercase dark:text-white"
                    >
                        Latest news
                    </h4>
                    <div class="mb-6 flex items-center">
                        <a href="#" class="shrink-0">
                            <img
                                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/articles/image-1.png"
                                class="mr-4 h-24 w-24 max-w-full rounded-lg"
                                alt="Image 1"
                            />
                        </a>
                        <div>
                            <h5
                                class="mb-2 text-lg leading-tight font-bold text-gray-900 dark:text-white"
                            >
                                Our first office
                            </h5>
                            <p class="mb-2 text-gray-500 dark:text-gray-400">
                                Over the past year, Volosoft has undergone
                                changes.
                            </p>
                            <a
                                href="#"
                                class="inline-flex items-center font-medium text-blue-500 underline underline-offset-4 hover:no-underline"
                            >
                                Read in 9 minutes
                            </a>
                        </div>
                    </div>
                    <div class="mb-6 flex items-center">
                        <a href="#" class="shrink-0">
                            <img
                                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/articles/image-2.png"
                                class="mr-4 h-24 w-24 max-w-full rounded-lg"
                                alt="Image 2"
                            />
                        </a>
                        <div>
                            <h5
                                class="mb-2 text-lg leading-tight font-bold text-gray-900 dark:text-white"
                            >
                                Enterprise Design tips
                            </h5>
                            <p class="mb-2 text-gray-500 dark:text-gray-400">
                                Over the past year, Volosoft has undergone
                                changes.
                            </p>
                            <a
                                href="#"
                                class="inline-flex items-center font-medium text-blue-500 underline underline-offset-4 hover:no-underline"
                            >
                                Read in 14 minutes
                            </a>
                        </div>
                    </div>
                    <div class="mb-6 flex items-center">
                        <a href="#" class="shrink-0">
                            <img
                                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/articles/image-3.png"
                                class="mr-4 h-24 w-24 max-w-full rounded-lg"
                                alt="Image 3"
                            />
                        </a>
                        <div>
                            <h5
                                class="mb-2 text-lg leading-tight font-bold text-gray-900 dark:text-white"
                            >
                                Partnered up with Google
                            </h5>
                            <p class="mb-2 text-gray-500 dark:text-gray-400">
                                Over the past year, Volosoft has undergone
                                changes.
                            </p>
                            <a
                                href="#"
                                class="inline-flex items-center font-medium text-blue-500 underline underline-offset-4 hover:no-underline"
                            >
                                Read in 9 minutes
                            </a>
                        </div>
                    </div>
                </div>
                <div>
                    <a
                        href="#"
                        class="mb-3 flex h-48 w-full items-center justify-center rounded-lg bg-gray-100 dark:bg-gray-700"
                    >
                        <svg
                            aria-hidden="true"
                            class="h-8 w-8 text-gray-400"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </a>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                        Students and Teachers, save up to 60% on Flowbite
                        Creative Cloud.
                    </p>
                    <p
                        class="text-xs text-gray-400 uppercase dark:text-gray-500"
                    >
                        Ads placeholder
                    </p>
                </div>
            </div>
        </aside>
    </div>
</main>
