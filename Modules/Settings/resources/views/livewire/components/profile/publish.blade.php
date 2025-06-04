<x-settings::action-section>
    <x-slot name="title">Publish profile</x-slot>

    <x-slot name="description">
        Setting to put your profile in the spotlight
    </x-slot>

    <x-slot name="content">
        <div class="space-y-6">
            <div
                class="mb-4 rounded-lg border border-gray-200 p-4 dark:border-gray-700"
            >
                <div class="mb-2 flex items-center justify-between">
                    <div>Publish profile</div>
                    <label class="inline-flex cursor-pointer items-center">
                        <input
                            wire:model.change="public"
                            id="google-connect"
                            type="checkbox"
                            value=""
                            class="peer sr-only"
                        />
                        <div
                            class="peer relative h-6 w-11 rounded-full bg-gray-200 peer-checked:bg-blue-600 peer-focus:ring-4 peer-focus:ring-blue-300 peer-focus:outline-none after:absolute after:start-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:after:translate-x-full peer-checked:after:border-white rtl:peer-checked:after:-translate-x-full dark:border-gray-600 dark:bg-gray-700 dark:peer-checked:bg-blue-600 dark:peer-focus:ring-blue-800"
                        ></div>
                    </label>
                </div>
                <div
                    class="text-base font-normal text-gray-500 dark:text-gray-400"
                >
                    Choose wether you want to publish your profile in browser.
                    <br />
                    Disabling this will put you in private mode. You can still
                    like other profiles when disabled.
                </div>
            </div>
        </div>
    </x-slot>
</x-settings::action-section>
