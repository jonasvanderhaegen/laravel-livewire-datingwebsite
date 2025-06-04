@props(['id' => null, 'maxWidth' => null])

<x-settings::modal :id="$id" {{ $attributes }}>
    @if ($title)
        <x-slot name="title">
            {{ $title }}
        </x-slot>
    @endif

    {{ $content }}
</x-settings::modal>
