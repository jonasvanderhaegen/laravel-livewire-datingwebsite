<div
    x-show="activeTab === '{{ $activeTab }}'"
    class="bg-g text-medium w-full rounded-lg px-6 text-gray-500 dark:bg-gray-800 dark:text-slate-400"
>
    <div class="pb-4 text-center">
        <h3 class="text-lg font-bold text-gray-900 dark:text-white">
            {{ $title }}
        </h3>

        <p class="text-center text-sm">
            {{ $description }}
        </p>
    </div>

    <div
        class="h-[350px] overflow-y-scroll  border-t border-b border-slate-300 px-0 md:h-[720px] dark:border-slate-700"
        style="scrollbar-gutter: stable"
    >
        {{ $content }}
    </div>
    @isset($notsay)
        <div class="flux mb-4 items-center justify-center py-4 text-center">
            <label class="inline-flex cursor-pointer items-center">
                <input
                    type="checkbox"
                    value=""
                    class="peer sr-only"
                    wire:model.change="{{ $notsay }}.prefer_not_say"
                />
                <div
                    class="peer relative h-6 w-11 rounded-full bg-gray-200 peer-checked:bg-blue-600 peer-focus:ring-4 peer-focus:ring-blue-300 peer-focus:outline-none after:absolute after:start-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:after:translate-x-full peer-checked:after:border-white rtl:peer-checked:after:-translate-x-full dark:border-gray-600 dark:bg-gray-700 dark:peer-checked:bg-blue-600 dark:peer-focus:ring-blue-800"
                ></div>
                <span
                    class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300"
                >
                    Prefer not to say
                </span>
            </label>
        </div>
    @endisset
</div>
