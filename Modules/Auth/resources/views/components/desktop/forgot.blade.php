@if($intent == 'passkey')

    <x-customtheme::page-layouts.auth>
        <x-slot name="topLeft">

            <x-core::form :form="$this->form"
                          submit="submit"
                          :title="$intent == 'password' ? __('Request a link to reset your password') : __('Request a link to add keypass to your account')"
                          :button-text="__('Send request to reset')"
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

                <x-slot name="underForm">
                    <x-core::form-link route="register" :grayText="__('If you can\'t access your email')" :blueText="__('create new account')" />
                </x-slot>

                <x-slot name="status">
                    <div
                        class="mb-4 flex items-center rounded-lg border border-green-300 bg-green-50 p-4 text-sm text-green-800 dark:border-green-800 dark:bg-gray-800 dark:text-green-400"
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
                            {{ __('A link will be sent if the account exists.') }}
                        </div>
                    </div>
                </x-slot>

            </x-core::form>

        </x-slot>
    </x-customtheme::page-layouts.auth>

@else
    <x-customtheme::page-layouts.page-with-image-banner
        :title="__('Forgot password?')"
        :description="__('Send request to receive e-mail with link to reset password')"
        :image="false"
    >
        <x-slot name="body">
            <div class="grid mx-auto lg:gap-20 lg:grid-cols-12">
                <div class="w-full place-self-center lg:col-span-6">

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
                </div>
                <div class="mr-auto place-self-center lg:col-span-6 w-full">
                    <x-flowbite::svg.man-working-question-mark class="w-full" />
                </div>
            </div>
        </x-slot>
    </x-customtheme::page-layouts.page-with-image-banner>
@endif
