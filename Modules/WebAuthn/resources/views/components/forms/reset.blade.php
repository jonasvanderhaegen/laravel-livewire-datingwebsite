<x-core::form :form="$this->form"
              submit="submit"
              :title="__('Reset passkey')"
              :button-text="__('Request passkey prompt')"
              class="rounded-4xl bg-white p-8 shadow-md space-y-6 dark:bg-gray-800">

    <x-slot name="underForm">
        <x-core::form-link route="login" :grayText="__('Already have an account?')" :blueText="__('Log in here')" />
        <x-core::form-link route="passkeys.instructions" :grayText="__('Highly recommended for first-timers')" :blueText="__('How to save passkey with registration')" />
    </x-slot>

</x-core::form>
