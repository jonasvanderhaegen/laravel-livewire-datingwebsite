@props(['id', 'maxWidth'])

@php
    $id = $id ?? md5($attributes->wire('model'));

    $maxWidth = [
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        '2xl' => 'sm:max-w-2xl',
    ][$maxWidth ?? '2xl'];
@endphp

<div
    id="{{ $id }}"
    tabindex="-1"
    aria-hidden="true"
    class="h-modal fixed top-0 right-0 left-0 z-50 hidden w-full items-center justify-center overflow-x-hidden overflow-y-auto md:inset-0 md:h-full"
>
    <div class="relative h-full w-full max-w-lg p-4 md:h-auto">
        <!-- Modal content -->
        <div class="relative rounded-lg bg-white shadow dark:bg-gray-800">
            <div class="flex items-center justify-between px-4 py-4 sm:px-5">
                <h3
                    class="text-lg leading-none font-semibold text-gray-900 dark:text-white"
                >
                    {{ $title }}
                </h3>

                <button
                    type="button"
                    class="absolute top-2.5 right-2.5 ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="{{ $id }}"
                >
                    <svg
                        aria-hidden="true"
                        class="h-5 w-5"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            {{ $slot }}
        </div>
    </div>
</div>
