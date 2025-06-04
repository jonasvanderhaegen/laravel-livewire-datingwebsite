<div>
    <x-settings::form-section class="mb-5" submit="submit">
        <x-slot name="title"></x-slot>

        <x-slot name="description">
            Minimum 1 and maximum 6 passkeys.
            <br />
            In case you're unfamiliar how to manage more passkeys you can
            <a
                href="https://datingwebsite.test/settings/profile-preview"
                wire:navigate.hover
                class="inline-flex items-center font-medium text-blue-500 hover:underline"
            >
                click here to view our how-to guide
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
                    ></path>
                </svg>
            </a>
        </x-slot>

        <x-slot name="form">
            @can('create', Spatie\LaravelPasskeys\Models\Passkey::class)
                <div class="col-span-6">
                    <label for="underline_select" class="sr-only">
                        Underline select
                    </label>
                    <select
                        id="underline_select"
                        required
                        wire:model.change="form.name"
                        class="peer block w-full appearance-none border-0 border-b-2 border-gray-200 bg-transparent px-0 py-2.5 text-sm text-gray-500 focus:border-gray-200 focus:ring-0 focus:outline-none dark:border-gray-700 dark:text-gray-400"
                    >
                        {{-- TODO: CDN for options --}}
                        <option selected>Choose an option</option>
                        <option
                            value="passkey in Apple wachtwoorden, iCloud sleutelhanger"
                        >
                            passkey in Apple wachtwoorden, iCloud sleutelhanger
                        </option>
                        <option value="Chrome profile">
                            Google Chrome profile
                        </option>
                        <option value="Google password manager">
                            Google password manager
                        </option>
                        <option value="Bitwarden">
                            Bitwarden, password manager
                        </option>
                        <option value="1Password">
                            1Password, password manager
                        </option>
                        <option value="Other">Other</option>
                    </select>
                    <p
                        id="floating_helper_text"
                        class="mt-2 text-xs text-gray-500 dark:text-gray-400"
                    >
                        For your information: Passkey will overwrite if you
                        choose the same intent. For example if you've passkey in
                        iCloud and you add a new passkey also for iCloud it will
                        overwrite the existing passkey on your iCloud.
                    </p>
                </div>
            @else
                <x-flowbite::input.text-field
                    field="form.name"
                    type="text"
                    :label="__('Name')"
                    :helper="__('Give a name to the passkey')"
                    required
                    divclass="col-span-6 sm:col-span-4"
                    disabled
                />
            @endcan
        </x-slot>

        <x-slot name="actions">
            <x-settings::action-message class="me-3" on="saved">
                {{ __('Saved.') }}
            </x-settings::action-message>

            @can('create', Spatie\LaravelPasskeys\Models\Passkey::class)
                <x-settings::button
                    :disabled="! $form->isValid()"
                    wire:loading.delay.long.attr="disabled"
                >
                    {{ __('Add passkey') }}
                </x-settings::button>

                @include('passkeys::livewire.partials.createScript')
            @else
                <p class="text-sm text-gray-600">
                    You’ve reached the maximum of 6 passkeys.
                </p>
            @endcan
        </x-slot>
    </x-settings::form-section>

    <x-settings::action-section>
        <x-slot name="title">
            {{ __('Security') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Passkey management. In case you delete passkey(s) from the website please also delete the relevant passkey(s) on your device(s). "registration" and "reset" passkeys are relevant to your past user actions.') }}
        </x-slot>

        <x-slot name="content">
            <div class="full-w block">
                <h3 class="font-medium text-gray-900 dark:text-white">
                    {{ __('Your Passkeys') }} ({{ $passkeys->count() }}/6)
                </h3>
                <ul class="mt-2">
                    @foreach ($passkeys as $passkey)
                        <li class="flex items-center justify-between px-2 py-2">
                            <div class="flex flex-col">
                                <span class="font-semibold">
                                    {{ $passkey->name }}
                                </span>
                                <span
                                    class="text-sm font-thin text-gray-600 dark:text-gray-200"
                                >
                                    Added
                                    {{ $passkey->created_at->diffForHumans() }}
                                </span>
                            </div>

                            @can('delete', $passkey)
                                <form
                                    method="post"
                                    action="{{ route('settings.passkeys.destroy', $passkey) }}"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <x-settings::danger-button
                                        type="submit"
                                        class="rounded-full"
                                    >
                                        <span class="hidden md:block">
                                            Delete passkey
                                        </span>
                                        <span class="md:hidden">Delete</span>
                                    </x-settings::danger-button>
                                </form>
                            @endcan
                        </li>
                    @endforeach
                </ul>
            </div>
        </x-slot>
    </x-settings::action-section>
</div>
