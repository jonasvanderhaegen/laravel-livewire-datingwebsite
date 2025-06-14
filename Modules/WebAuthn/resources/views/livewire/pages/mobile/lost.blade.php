<section class="bg-white dark:bg-gray-900">
    <x-flowbite::boxed-width class="pt-8">
        <x-slot name="body">
            <div
                class="mb-8 flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4 lg:mb-16"
            >
                <x-webauthn::forms.lost />

            </div>

            <x-flowbite::svg.man-working-question-mark
                class="z-1 mx-auto w-1/2 lg:mb-8 dark:flex"
            />
        </x-slot>
    </x-flowbite::boxed-width>

    <div
        class="z-2 -mt-27 bg-pink-200 pt-27 pb-10 dark:bg-blue-950"
    >
        <x-flowbite::boxed-width class="mt-8 text-center">
            <x-slot name="body">
                <h2
                    class="mb-4 text-3xl font-extrabold tracking-tight text-white"
                >
                    Passkeys
                </h2>
                <p
                    class="font-light text-pink-500 sm:text-xl dark:text-gray-400"
                >
                    By making passkeys the blue way to register and log in, it
                    ensures our community stays genuine, active, and free from
                    wasted profiles. It also grants you many benefits
                </p>
            </x-slot>
        </x-flowbite::boxed-width>
    </div>
</section>
