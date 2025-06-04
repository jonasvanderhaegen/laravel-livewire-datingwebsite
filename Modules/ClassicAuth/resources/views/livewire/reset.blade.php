<x-customtheme::page-layouts.horizontal-split-left-page>
<x-slot name="left">
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
            class="w-full max-w-md space-y-4 md:space-y-6 xl:max-w-xl"
            action="#"
            wire:submit.prevent="submit"
        >
            <fieldset :disabled="remaining > 0" class="space-y-4 md:space-y-6">
                <h1
                    class="text-xl leading-tight font-bold tracking-tight text-gray-900 sm:text-2xl dark:text-white"
                >
                    Update your password
                </h1>

                <p class="font-light text-gray-500 dark:text-gray-400">
                    Your new password must be different from previous used
                    passwords.
                </p>

                <x-flowbite::input.text-field
                    field="form.email"
                    type="email"
                    label="{{ __('E-mail address') }}"
                    helper="{{ __('For example: john.doe@example.com') }}"
                    required
                    disabled
                />

                <x-flowbite::input.text-field
                    field="form.password"
                    type="password"
                    label="{{ __('Password') }}"
                    helper="{{ __('********') }}"
                    :show-password="$showPassword"
                    required
                />

                <button
                    type="submit"
                    class="w-full rounded-lg bg-blue-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-500 focus:ring-4 focus:ring-blue-300 focus:outline-none disabled:opacity-50 dark:bg-blue-500 dark:hover:bg-blue-500 dark:focus:ring-blue-800"
                >
                    <template x-if="remaining > 0">
                        <span>
                            Reset password again in
                            <span
                                x-text="Math.floor(remaining / 60) + ':' + String(remaining % 60).padStart(2, '0')"
                            ></span>
                        </span>
                    </template>
                    <template x-if="remaining === 0">
                        <span>Reset password</span>
                    </template>
                </button>
            </fieldset>
        </form>
    </x-slot>
</x-customtheme::page-layouts.horizontal-split-left-page>
