<div>
    <x-customtheme::page-layouts.page-with-image-banner
        :title="__('One time password page')"
        :description="__('An e-mail with password will be sent to you, use it within 2 minutes')"
        :image="false"
    >
        <x-slot name="body">
            <div class="grid mx-auto lg:gap-20 lg:grid-cols-12">
                <div class="w-full place-self-center lg:col-span-6">


                </div>
                <div class="mr-auto place-self-center lg:col-span-6 w-full">
                    <x-flowbite::svg.auth-login class="w-full" />
                </div>
            </div>
        </x-slot>
    </x-customtheme::page-layouts.page-with-image-banner>
</div>
