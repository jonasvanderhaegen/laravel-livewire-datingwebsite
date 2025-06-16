<section class="bg-white dark:bg-gray-900">

    <x-flowbite::boxed-width class="pt-8">
        <x-slot name="body">

            <x-webauthn::forms.registration />

            <x-webauthn::svg.security-biometrics
                class="z-1 mx-auto w-1/2 mt-10"
            />
        </x-slot>
    </x-flowbite::boxed-width>

    <div
        class="z-2 -mt-27 bg-pink-200 pt-27 pb-10 dark:bg-blue-950"
    >
        <x-flowbite::boxed-width class="mt-8 text-center">
            <x-slot name="body">
                <div class="space-y-4">
                    <h3 class="text-2xl leading-tight font-extrabold text-pink-400 dark:text-orange-300">
                        Step by step
                    </h3>

                    <p class="mt-4 mb-8 text-base text-xl font-normal text-pink-400 dark:text-slate-100">
                        Please follow these steps to register with a passkey. It's a
                        replacement for password that offers a more secure, faster and
                        easier way to sign-in.
                    </p>

                    <div class="px-4">
                    <ol class="relative border-s border-pink-300 dark:border-slate-200 text-pink-400 dark:text-slate-50 text-left">
                        <li class="ms-8 mb-10">
                <span class="absolute -start-4 flex h-8 w-8 items-center justify-center rounded-full dark:bg-blue-500 bg-white ring-4 dark:ring-blue-950 ring-pink-200">

                    1
                </span>
                            <h3 class="leading-tight font-medium">Form</h3>
                            <p class="text-sm">Fill in form and click submit button.</p>
                        </li>
                        <li class="ms-8 mb-10">
                <span class="absolute -start-4 flex h-8 w-8 items-center justify-center rounded-full dark:bg-blue-500 bg-white ring-4 dark:ring-blue-950 ring-pink-200">
                    2
                </span>
                            <h3 class="leading-tight font-medium">
                                Pop-up to save passkey
                            </h3>
                            <p class="text-sm">
                                This will pop up a small window on your screen to ask to
                                save a passkey on your device or elsewhere. Select the
                                option you prefer and try to remember where you saved it.
                            </p>
                        </li>
                        <li class="ms-8 mb-10">
                <span class="absolute -start-4 flex h-8 w-8 items-center justify-center rounded-full dark:bg-blue-500 bg-white ring-4 dark:ring-blue-950 ring-pink-200">
                    3
                </span>
                            <h3 class="leading-tight font-medium">E-mail verification</h3>
                            <p class="text-sm">
                                Once you saved the passkey successfully an e-mail will be
                                sent to your inbox with a link to verify your account. Check
                                junk/spam folder. You'll be able to re-send in case you
                                didn't receive anything.
                            </p>
                        </li>
                        <li class="ms-8">
                <span class="absolute -start-4 flex h-8 w-8 items-center justify-center rounded-full dark:bg-blue-500 bg-white ring-4 dark:ring-blue-950 ring-pink-200">
                    <svg class="h-3.5 w-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                        <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z"></path>
                    </svg>
                </span>
                            <h3 class="leading-tight font-medium">Onboarding process</h3>
                            <p class="text-sm">
                                After a successful e-mail verification there will be a short
                                onboarding process to complete part of your account.
                            </p>
                        </li>
                    </ol>
                    </div>
                </div>
            </x-slot>

        </x-flowbite::boxed-width>
    </div>

</section>

