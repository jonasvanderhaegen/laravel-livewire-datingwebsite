<x-settings::form-section submit="submit">
    <x-slot name="title">
        {{ __('') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update password') }}
    </x-slot>

    <x-slot name="form">
        <x-flowbite::input.text-field
            field="form.current_password"
            type="password"
            :show-password="$showPassword"
            :label="__('Current Password')"
            :helper="__('Test 123')"
            required
            divclass="col-span-6 sm:col-span-4"
        />

        <x-flowbite::input.text-field
            field="form.password"
            type="password"
            :show-password="$showPassword"
            :label="__('New password')"
            :helper="__('Test 123')"
            required
            divclass="col-span-6 sm:col-span-4"
        />
    </x-slot>

    <x-slot name="actions">
        <x-settings::action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-settings::action-message>

        <x-settings::button
            :disabled="! $form->isValid()"
            wire:loading.delay.long.attr="disabled"
        >
            {{ __('Save') }}
        </x-settings::button>
    </x-slot>
</x-settings::form-section>
