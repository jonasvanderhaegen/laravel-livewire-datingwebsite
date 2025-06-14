<x-core::form :form="$this->form"
              submit="submit"
              :title="__('A verification e-mail notification will be sent after registration')"
              button-text="Register"
              class="rounded-4xl bg-white p-8 shadow-md space-y-6 dark:bg-gray-800">

    <x-slot name="fields">
        <div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-2">
            <x-flowbite::input.text-field
                field="form.firstname"
                type="text"
                label="{{ __('First name') }}"
                helper="{{ __('John') }}"
                required
            />

            <x-flowbite::input.text-field
                field="form.lastname"
                type="text"
                label="{{ __('Last name') }}"
                helper="{{ __('Doe') }}"
                required
            />
        </div>

        <x-flowbite::input.text-field
            field="form.email"
            type="email"
            :label="__('E-mail address')"
            :helper="__('For example: john.doe@example.com')"
            required
        />

        <x-flowbite::input.text-field
            field="form.password"
            type="password"
            label="{{ __('password') }}"
            helper="{{ __('Your current password') }}"
            required
            :showPassword="$showPassword"
        />

        <x-flowbite::input.text-field
            field="form.dob"
            type="text"
            label="{{ __('Birthday') }}"
            helper="{{ __('18 or older only, day - month - year') }}"
            required
            x-mask="99-99-9999"
        />

        <div class="">
            <div class="flex items-start">
                <div class="flex h-5 items-center">
                    <input
                        id="remember"
                        wire:model.live="form.terms"
                        aria-describedby="remember"
                        type="checkbox"
                        class="h-4 w-4 rounded border border-gray-300 bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                    />
                </div>
                <div class="ml-3 text-sm">
                    <label
                        for="remember"
                        class="text-gray-500 dark:text-gray-300"
                    >
                        I agree to terms and conditions
                    </label>
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="underForm">
        <x-core::form-link route="classicauth.login" :grayText="__('Already have an account?')" :blueText="__('Log in here')" />
        <x-core::form-link route="password.request" :grayText="__('Forgot password or have no password yet?')" :blueText="__('Go here for password reset')" />
    </x-slot>

</x-core::form>
