<div>
    <x-customtheme::page-layouts.page-with-image-banner
        :title="__('Login page')"
        :description="__('With regular password')"
        :image="false"
    >
        <x-slot name="body">
            <div class="grid mx-auto lg:gap-20 lg:grid-cols-12">
                <div class="w-full place-self-center lg:col-span-6">

                    <x-classicauth::forms.login :showPassword="$showPassword" />

                </div>
                <div class="mr-auto place-self-center lg:col-span-6 w-full">
                    <x-flowbite::svg.auth-login class="w-full" />
                </div>
            </div>
        </x-slot>
    </x-customtheme::page-layouts.page-with-image-banner>
</div>
