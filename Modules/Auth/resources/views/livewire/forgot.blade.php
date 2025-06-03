
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
                    @if ($intent == 'password')
                        Request a link to reset your password
                    @else
                            Request a link to add keypass to your account
                    @endif
                </h1>

                @if (session('status') == 'password-request-sent')
                    <div
                        class="mb-4 flex items-center rounded-lg border border-green-300 bg-green-50 p-4 text-sm text-green-800 dark:border-green-800 dark:bg-gray-800 dark:text-green-400"
                        role="alert"
                    >
                        <svg
                            class="me-3 inline h-4 w-4 shrink-0"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"
                            />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            {{ __('A link will be sent if the account exists.') }}
                        </div>
                    </div>
                @endif

                @if (session('status') == 'password-reset-token-invalid')
                    <div
                        class="mb-4 flex items-center rounded-lg border border-red-300 bg-red-50 p-4 text-sm text-red-800 dark:border-red-800 dark:bg-gray-800 dark:text-red-400"
                        role="alert"
                    >
                        <svg
                            class="me-3 inline h-4 w-4 shrink-0"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"
                            />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            @if ($intent == 'password')
                                {{ __('The link was corrupt, try again with password request.') }}
                            @else
                                {{ __('The link was corrupt, try again with passkey request.') }}
                            @endif
                        </div>
                    </div>
                @endif

                <p class="font-light text-gray-500 dark:text-gray-400">
                    @if ($intent == 'password')
                        {{ __('We’ll email you instructions to reset your password.') }}
                    @else
                        {{ __('We’ll email you instructions to reset your passkey.') }}
                    @endif

                    If you can't access your email, you can
                    <a
                        href="{{ route('register') }}"
                        wire:navigate.hover
                        class="font-medium text-blue-500 hover:underline"
                    >
                        create new account
                    </a>
                    .
                </p>

                <x-core::input.text-field
                    field="form.email"
                    type="email"
                    :label="__('E-mail address')"
                    :helper="__('For example: john.doe@example.com')"
                    required
                />

                <button
                    type="submit"
                    class="cursor pointer w-full rounded-lg bg-blue-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-500 focus:ring-4 focus:ring-blue-300 focus:outline-none disabled:opacity-50 dark:bg-blue-500 dark:hover:bg-blue-500 dark:focus:ring-blue-800"
                >
                    <template x-if="remaining > 0">
                        <span>
                            Resend request again in
                            <span
                                x-text="Math.floor(remaining / 60) + ':' + String(remaining % 60).padStart(2, '0')"
                            ></span>
                        </span>
                    </template>
                    <template x-if="remaining === 0">
                        <span>
                            Send request to reset
                            @if ($intent == 'password')
                                {{ __('password') }}
                            @else
                                {{ __('passkey') }}
                            @endif
                        </span>
                    </template>
                </button>
            </fieldset>
        </form>
