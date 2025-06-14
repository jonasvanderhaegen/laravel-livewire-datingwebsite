<section class="bg-white dark:bg-gray-900">
    <x-flowbite::boxed-width class="pt-8">
        <x-slot name="body">

            <x-classicauth::forms.forgot />

            <x-flowbite::svg.man-working-question-mark
                class="mt-10 z-1 mx-auto w-1/2 lg:mb-8 dark:flex"
            />
        </x-slot>
    </x-flowbite::boxed-width>

    <div
        class="z-2 -mt-20 -mb-5 bg-pink-200 pt-25 pb-10 sm:-mt-80 sm:pt-80 lg:pb-16 dark:bg-blue-950"
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
