<li role="presentation">
    <button
        type="button"
        class="flux cursor-pointer items-center justify-between rounded-full bg-white px-4 py-3 hover:bg-gray-100 hover:text-blue-300 md:inline-flex md:w-full dark:hover:bg-gray-700 dark:hover:text-blue-400"
        @click="activeTab = '{{ $activeTab }}'"
        :class="activeTab === '{{ $activeTab }}' ? '!bg-blue-600 text-white' : 'bg-slate-100 dark:bg-gray-800'"
    >
        <span>{{ $title }}</span>
        <span class="hidden lg:block">{{ $slot }}</span>
    </button>
</li>
