@props(['notsay' => false, 'option' => null, 'model' => '', 'type' => '', 'value' => null])

@php
    $slug = Str::slug($option->name);
@endphp

<input
    type="{{ $type }}"
    id="{{ $slug }}-option"
    wire:model.change="{{ $model }}"
    value="{{ $value }}"
    class="peer hidden"
/>
<label
    for="{{ $slug }}-option"
    @class([
        'inline-flex w-full items-center justify-between border-1 border-gray-200 bg-white p-5 text-gray-500 peer-checked:border-blue-600 peer-checked:text-gray-600 hover:bg-gray-50 hover:text-gray-600 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:peer-checked:border-blue-600 dark:peer-checked:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-gray-300',
        $notsay ? 'cursor-not-allowed opacity-50' : 'cursor-pointer opacity-100',
    ])
>
    <div class="block">
        <div class="w-full text-xs font-semibold md:text-lg">
            {{ __($option->name) }}
        </div>

        @isset($option->description)
            <div class="w-full text-xs md:text-sm">
                {{ __($option->description) }}
            </div>
        @endisset
    </div>
</label>
