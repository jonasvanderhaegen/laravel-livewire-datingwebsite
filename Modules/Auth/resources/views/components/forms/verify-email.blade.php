<x-core::form :form="$this->form"
              submit="resendVerification"
              :title="__('E-mail verification')"
              :subtitle="__('Please verify your email address by clicking on the link we just emailed to you. Check junk/spam folder in case you have not received anything. You can click button below to re-send e-mail.')"
              :button-text="__('Resend verification email')"
              class="rounded-4xl bg-white p-8 shadow-md space-y-6 dark:bg-gray-800">

    <x-slot name="fields">

    </x-slot>


    <x-slot name="status">
        <div
            class="mb-4 flex items-center rounded-4xl border border-green-300 bg-green-50 p-4 text-sm text-green-800 dark:border-green-800 dark:bg-gray-800 dark:text-green-400"
            role="alert"
        >
            <svg
                class="me-3 inline h-4 w-4 shrink-0"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 20 20"
            >
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"
                />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        </div>
    </x-slot>

</x-core::form>
