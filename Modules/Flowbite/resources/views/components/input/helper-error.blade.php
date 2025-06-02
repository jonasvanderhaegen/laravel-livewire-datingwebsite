@props(['error' => false, 'helper' => false])

@error($error)
    <x-flowbite::input.error error="{{$error}}" />
@enderror

@if ($helper)
    <x-flowbite::input.helper-text helper="{{ $helper }}" />
@endif
