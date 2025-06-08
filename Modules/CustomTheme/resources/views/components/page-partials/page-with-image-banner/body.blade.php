<div class="">
    <x-flowbite::boxed-width
        @class([
            'rounded-4xl flex relative z-20 justify-between py-12 px-10 2xl:max-w-[93rem] bg-gradient-to-b border-white border-2 dark:border-gray-800 xl:mx-auto w-full ',
            '-m-36 xl:-m-32' => $image,
            '-mb-36 xl:-mb-32' => ! $image,
            isset($underbody) ? 'bg-white dark:bg-gray-800' : 'from-white via-white to-slate-100 dark:from-gray-800 dark:via-gray-800 dark:to-gray-900 ',
        ])
    >
        <x-slot name="body">
            <article
                @class([
                    'format format-sm sm:format-base lg:format-lg format-blue dark:format-invert w-full max-w-none space-y-4',
                    isset($aside) ? 'xl:w-[830px] 2xl:w-[980px]' : '',
                ])
            >
                {{ $body }}
            </article>

            @isset($aside)
                <aside class="hidden xl:block" aria-labelledby="sidebar-label">
                    <div class="sticky top-25 xl:w-[336px]">
                        <h3 id="sidebar-label" class="sr-only">Sidebar</h3>
                        {{ $aside }}
                    </div>
                </aside>
            @endisset
        </x-slot>
    </x-flowbite::boxed-width>

    @isset($underbody)
        {{ $underbody }}
    @endisset
</div>
