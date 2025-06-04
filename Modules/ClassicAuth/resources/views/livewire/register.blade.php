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
            class="max-w-md xl:max-w-xl"
            wire:submit.prevent="submit"
        >
            <fieldset :disabled="remaining > 0" class="space-y-4 md:space-y-6">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                    Registration
                </h2>
                <p class="text-md font-bold text-gray-700 dark:text-gray-400">
                    You must be 18 years or older
                </p>

                <x-flowbite::input.text-field
                    field="form.name"
                    type="text"
                    label="{{ __('Your full name') }}"
                    helper="{{ __('John Doe') }}"
                    required
                />

                <x-flowbite::input.text-field
                    field="form.email"
                    type="email"
                    label="{{ __('E-mail address') }}"
                    helper="{{ __('For example: john.doe@example.com') }}"
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

                <x-flowbite::input.text-field
                    field="form.dob"
                    type="text"
                    label="{{ __('Birthday') }}"
                    helper="{{ __('18 or older only, day - month - year') }}"
                    required
                    x-mask="99-99-9999"
                />

                <div class="space-y-3">
                    <div class="flex items-start">
                        <div class="flex h-5 items-center">
                            <input
                                wire:model.live="form.confirm"
                                id="terms"
                                aria-describedby="terms"
                                type="checkbox"
                                class="h-4 w-4 rounded border border-gray-300 bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                required=""
                            />
                        </div>
                        <div class="ml-3 text-sm">
                            <label
                                for="terms"
                                class="font-light text-gray-500 dark:text-gray-300"
                            >
                                By signing up, you are creating a Flowbite
                                account, and you agree to Flowbite’s
                                <a
                                    class="font-medium text-blue-500 hover:underline"
                                    href="#"
                                >
                                    Terms of Use
                                </a>
                                and
                                <a
                                    class="font-medium text-blue-500 hover:underline"
                                    href="#"
                                >
                                    Privacy Policy
                                </a>
                                <span class="text-red-500">*</span>
                                @error('form.confirm')
                                    <span class="text-red-500">
                                        This is required.
                                    </span>
                                @enderror
                            </label>
                        </div>
                    </div>
                </div>

                <button
                    type="submit"
                    wire:loading.delay.long.attr="disabled"
                    {{ ! $form->isFormValid() ? 'disabled' : '' }}
                    class="w-full rounded-full bg-blue-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-500 focus:ring-4 focus:ring-blue-300 focus:outline-none disabled:opacity-50 dark:bg-blue-500 dark:hover:bg-blue-500 dark:focus:ring-blue-700"
                >
                    <template x-if="remaining > 0">
                        <span>
                            {{ __('Try to create an account in') }}
                            <span
                                x-text="Math.floor(remaining / 60) + ':' + String(remaining % 60).padStart(2, '0')"
                            ></span>
                        </span>
                    </template>
                    <template x-if="remaining === 0">
                        <span>{{ __('Create an account') }}</span>
                    </template>
                </button>
                <p class="text-sm font-light text-gray-500 dark:text-gray-300">
                    Already have an account?
                    <a
                        href="{{ route('login') }}"
                        wire:navigate.hover
                        class="font-medium text-blue-500 hover:underline dark:text-blue-500"
                    >
                        {{ __('Login here') }}
                    </a>
                </p>
            </fieldset>
        </form>
    </x-slot>
</x-customtheme::page-layouts.horizontal-split-left-page>
