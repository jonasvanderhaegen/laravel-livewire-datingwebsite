@props(['submit'])

<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6']) }}>
    <x-settings::section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-settings::section-title>

    <div class="mt-5 md:col-span-2 md:mt-0">
        <form wire:submit.prevent="{{ $submit }}">
            <div
                class="{{ isset($actions) ? 'rounded-tl-4xl rounded-tr-4xl' : 'rounded-4xl' }} bg-white px-6 py-8 shadow dark:bg-gray-800"
            >
                <div class="grid grid-cols-6 gap-6">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div
                    class="flex items-center justify-end rounded-br-4xl rounded-bl-4xl bg-gray-50 px-3 py-3 text-end shadow dark:bg-gray-800"
                >
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>
