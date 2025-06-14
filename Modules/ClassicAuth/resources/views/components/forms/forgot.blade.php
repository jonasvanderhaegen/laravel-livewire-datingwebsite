<x-core::form :form="$this->form"
              submit="submit"
              button-text="Send link"
              class="rounded-4xl bg-white p-8 shadow-md space-y-6 dark:bg-gray-800">

    <x-slot name="fields">

        <x-flowbite::input.text-field
            field="form.email"
            type="email"
            :label="__('E-mail address')"
            :helper="__('For example: john.doe@example.com')"
            required
        />


    </x-slot>

</x-core::form>
