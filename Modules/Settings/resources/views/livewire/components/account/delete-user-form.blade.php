<x-settings::action-section>
    <x-slot name="title">
        {{ __('Delete Account') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Permanently delete your account.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </div>

        <div class="mt-5 flex justify-end">
            <x-settings::danger-button
                wire:loading.attr="disabled"
                data-modal-target="deleteFormModal"
                data-modal-toggle="deleteFormModal"
            >
                {{ __('Delete Account') }}
            </x-settings::danger-button>
        </div>

        <x-settings::dialog-modal id="deleteFormModal">
            <x-slot name="title">
                {{ __('Are you sure you want to delete?') }}
            </x-slot>

            <x-slot name="content">
                <p
                    class="border-t border-b border-orange-200 bg-orange-100 px-4 py-4 font-light text-orange-700 sm:px-5 dark:border-gray-600 dark:bg-gray-700 dark:text-orange-300"
                >
                    This will not delete the passkey(s) relevant to this website
                    from your device, you must remove it manually yourself
                    <span class="font-semibold text-orange-500">AFTER</span>
                    deleting your account.
                </p>
                <div class="px-4 py-4 sm:px-5 sm:py-5">
                    <p class="mb-4 font-light text-gray-500 dark:text-gray-400">
                        This action
                        <span
                            class="font-semibold text-gray-900 dark:text-white"
                        >
                            CANNOT
                        </span>
                        be undone. You will no longer have access to your
                        dashboard and you won't receive any more emails from us.
                    </p>

                    <form action="" wire:submit.prevent="submit">
                        <x-settings::secondary-button
                            data-modal-toggle="deleteFormModal"
                        >
                            {{ __('Cancel') }}
                        </x-settings::secondary-button>

                        <x-settings::danger-button
                            class="ms-3"
                            type="submit"
                            wire:loading.attr="disabled"
                        >
                            {{ __('Delete Account') }}
                        </x-settings::danger-button>
                    </form>
                </div>
            </x-slot>
        </x-settings::dialog-modal>
    </x-slot>
</x-settings::action-section>
