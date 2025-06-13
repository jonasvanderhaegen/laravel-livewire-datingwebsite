<div>
    <x-customtheme::page-layouts.page-with-image-banner
        :title="__('Reset')"
        :description="__('With regular password')"
        :image="false"
    >
        <x-slot name="body">
            <div class="grid mx-auto lg:gap-20 lg:grid-cols-12">
                <div class="w-full place-self-center lg:col-span-6">

                    <x-core::form :form="$this->form"
                                  submit="submit"
                                  :button-text="__('Reset password')"
                                  class="rounded-4xl bg-white p-8 shadow-md space-y-6 dark:bg-gray-800">

                        <x-slot name="fields">

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
                                label="{{ __('Password') }}"
                                helper="{{ __('********') }}"
                                :show-password="$showPassword"
                                required
                            />


                        </x-slot>

                    </x-core::form>
                </div>
                <div class="mr-auto place-self-center lg:col-span-6 w-full">
                    <x-flowbite::svg.auth-login class="w-full" />
                </div>
            </div>
        </x-slot>
    </x-customtheme::page-layouts.page-with-image-banner>
</div>
