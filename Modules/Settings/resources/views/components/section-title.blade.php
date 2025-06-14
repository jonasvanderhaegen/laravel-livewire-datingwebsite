<div>
    <div class="flex justify-between md:col-span-1">
        <div class="px-6 sm:px-0">
            <h3 class="text-lg font-bold text-orange-400 dark:text-orange-300">
                {{ $title }}
            </h3>

            <p class="mt-1 text-sm font-bold text-gray-600 dark:text-gray-400">
                {{ $description }}
            </p>
        </div>

        <div class="px-4 sm:px-0">
            {{ $aside ?? '' }}
        </div>
    </div>

    @isset($nav)
        <div class="mt-4">
            {{ $nav }}
        </div>
    @endif
</div>
