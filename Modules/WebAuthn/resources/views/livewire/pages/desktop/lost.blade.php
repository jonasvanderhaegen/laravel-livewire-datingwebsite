@if($intent == 'passkey')

    <x-customtheme::page-layouts.auth>
        <x-slot name="topLeft">

            <x-webauthn::forms.lost />

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

                    <x-webauthn::forms.lost />

                </div>
                <div class="mr-auto place-self-center lg:col-span-6 w-full">
                    <x-flowbite::svg.man-working-question-mark class="w-full" />
                </div>
            </div>
        </x-slot>
    </x-customtheme::page-layouts.page-with-image-banner>
@endif
