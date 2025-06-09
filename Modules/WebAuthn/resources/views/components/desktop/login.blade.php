<x-customtheme::page-layouts.auth :activeTab="$this->activeTab">
    <x-slot name="topLeft">
        <form
            x-data="{
                remaining: @entangle('form.secondsUntilReset'),
                timer: null,
                startTimer() {
                    // clear any old timer
                    if (this.timer) clearInterval(this.timer)
                    // only start if remaining > 0
                    if (this.remaining > 0) {
                        this.timer = setInterval(() => {
                            if (this.remaining > 0) {
                                this.remaining--
                            } else {
                                clearInterval(this.timer)
                            }
                        }, 1000)
                    }
                },
            }"
            x-init="startTimer()"
            x-effect="startTimer()"
            class="w-full space-y-4 py-20 md:space-y-6 lg:py-0"
            action="#"
            wire:submit.prevent="submit"
        >
            <fieldset :disabled="remaining > 0" class="space-y-4 md:space-y-6">
                <button
                    type="submit"
                    class="group isolate mx-auto mb-15 flex cursor-pointer transition duration-500 ease-out will-change-transform hover:scale-110"
                >
                    <div
                        class="absolute top-16 left-14 z-0 size-35 self-center justify-self-center bg-blue-400/70 blur-3xl transition duration-500 ease-out group-hover:bg-blue-600/70 dark:bg-slate-950 dark:group-hover:bg-blue-500/70"
                        aria-hidden="true"
                    ></div>

                    <x-webauthn::svg.lock-password
                        class="z-1 mx-auto w-[350px]"
                    />
                </button>

                <h1
                    class="mb-5 text-center text-xl font-bold text-white md:mb-20"
                >
                    Click lock to start log in
                </h1>

                <a
                    href="{{ route('passkeys.instructions') }}"
                    wire:navigate.hover
                    class="mb-4 flex cursor-pointer items-center justify-center text-center text-sm font-medium text-blue-400"
                >
                    Read instructions for first time
                    <svg
                        class="ms-2 h-4 w-4 rtl:rotate-180"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 14 10"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9"
                        />
                    </svg>
                </a>

                <a
                    href="{{ route('passkey.request') }}"
                    wire:navigate.hover
                    class="flex cursor-pointer items-center justify-center text-center text-sm font-medium text-orange-400"
                >
                    Passkey is invalid or no passkey was found?
                    <svg
                        class="ms-2 h-4 w-4 rtl:rotate-180"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 14 10"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9"
                        />
                    </svg>
                </a>
            </fieldset>
        </form>
    </x-slot>
</x-customtheme::page-layouts.auth>
