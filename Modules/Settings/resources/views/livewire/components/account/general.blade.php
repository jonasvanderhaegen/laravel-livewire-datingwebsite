<x-settings::form-section submit="submit">
    <x-slot name="title">
        {{ __('General') }}
    </x-slot>

    <x-slot name="description">
        {{ __('All the basics') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 flex grid grid-cols-2 gap-8 sm:col-span-4">
            <x-flowbite::input.text-field
                field="form.first_name"
                type="text"
                :label="__('First name')"
                :helper="__('For example: John Doe')"
                required
                divclass=""
            />

            <x-flowbite::input.text-field
                field="form.last_name"
                type="text"
                :label="__('Last name')"
                :helper="__('For example: John Doe')"
                required
                divclass=""
            />
        </div>

        <x-flowbite::input.text-field
            field="form.birth_date"
            type="text"
            label="{{ __('Birthday') }}"
            helper="{{ __('18 or older only, day - month - year') }}"
            required
            x-mask="99-99-9999"
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
