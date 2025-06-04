<section class="bg-slate-50 dark:bg-gray-900">
    <div class="grid lg:grid-cols-2">
        <x-customtheme::page-partials.horizontal-split-left-page.left>
            {{ $left }}
        </x-customtheme::page-partials.horizontal-split-left-page.left>

        <div
            class="flex items-center justify-center bg-blue-500 px-4 py-20 sm:px-0"
        >
            <div class="max-w-md xl:max-w-xl">
                <x-flowbite::svg.security-biometrics
                    class="mb-8 w-auto text-gray-800 dark:text-white"
                />

                <h1
                    class="mb-4 text-3xl leading-none font-extrabold tracking-tight text-orange-300 xl:text-5xl"
                >
                    Improved security and instant, one‑tap access
                </h1>
                <p class="font-light text-blue-200 xl:text-2xl">
                    Yes, there's no classic form with e-mail + password. Because
                    there's a much better way to sign up or log in. It's a
                    replacement for password that offers a more secure, faster
                    and easier way to sign-in to websites or apps across a
                    user's devices.
                </p>
            </div>
        </div>
    </div>
</section>
