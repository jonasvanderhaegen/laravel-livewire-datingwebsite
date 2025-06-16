@php
    use Modules\Profile\Models\Profile;
@endphp

<x-settings::action-section submit="submitInfo">
    <x-slot name="title">General information</x-slot>

    <x-slot name="description">
        @can('comment', Profile::class)
            <span class="hidden md:block">Select tab below</span>
            <span class="block md:hidden">
                Hold on tab so you can drag left or right for more options
            </span>
        @else
                Other settings are hidden from you in this onboarding process.
                More can be selected later. These are required for the
                onboarding process to continue.
        @endcan
    </x-slot>

    <x-slot name="nav">
        <div x-data="{ activeTab: @entangle('activeTab') }">
            <ul
                x-data="{
                    isDown: false,
                    startX: 0,
                    scrollLeft: 0,
                }"
                @mousedown.prevent="
                    isDown = true
                    startX = $event.pageX - $el.offsetLeft
                    scrollLeft = $el.scrollLeft
                  "
                @mouseup="isDown = false"
                @mouseleave="isDown = false"
                @mousemove="
                    if (!isDown) return
                    const x = $event.pageX - $el.offsetLeft
                    const walk = (x - startX) * 1    /* tweak the multiplier for sensitivity */
                    $el.scrollLeft = scrollLeft - walk
                  "
                id="profile-tabs"
                class="md:flex-column space-y no-scrollbar col-span-3 flex space-x-1 overflow-x-scroll text-sm font-medium text-gray-500 md:me-4 md:mb-0 md:mb-4 md:block md:space-y-1 md:space-x-0 dark:text-gray-400"
            >

                    <x-settings::profile-settings-tab
                        title="Language(s)"
                        activeTab="languages"
                    >
                        <x-settings::profile-settings-tab-selected-value
                            :form="$languageForm"
                        />
                    </x-settings::profile-settings-tab>

                    <x-settings::profile-settings-tab
                        title="Drink"
                        activeTab="drink"
                    >
                        <x-settings::profile-settings-tab-selected-value
                            :form="$drinkForm"
                        />
                    </x-settings::profile-settings-tab>

            </ul>
        </div>
    </x-slot>

    <x-slot name="content">
        <div
            class="col-span-6 flex"
            x-data="{ activeTab: @entangle('activeTab') }"
        >
            <div class="h-[420px] w-full md:h-[810px]">
                <x-settings::profile-settings-tab-panel
                    title="Language(s)"
                    activeTab="languages"
                    description="Tell us about your languages"
                    notsay="languageForm"
                >
                    <x-slot name="content">
                        <fieldset @disabled($languageForm->prefer_not_say)>
                            <ul class="">
                                @foreach ($languages as $option)
                                    <li>
                                        <x-settings::input-box
                                            :option="$option"
                                            :value="$loop->iteration"
                                            model="languageForm.languages"
                                            type="checkbox"
                                            :notsay="$languageForm->prefer_not_say"
                                        />
                                    </li>
                                @endforeach
                            </ul>
                        </fieldset>
                    </x-slot>
                </x-settings::profile-settings-tab-panel>

                <x-settings::profile-settings-tab-panel
                    title="Drink"
                    activeTab="drink"
                    description="Tell us about your drink habits"
                    notsay="drinkForm"
                >
                    <x-slot name="content">
                        <fieldset @disabled($drinkForm->prefer_not_say)>
                            <ul class="">
                                @foreach ($drink as $d)
                                    <li>
                                        <x-settings::input-box
                                            :option="$d"
                                            :value="$loop->iteration"
                                            model="drinkForm.value"
                                            type="radio"
                                            :notsay="$drinkForm->prefer_not_say"
                                        />
                                    </li>
                                @endforeach
                            </ul>
                        </fieldset>
                    </x-slot>
                </x-settings::profile-settings-tab-panel>

            </div>
        </div>

        <div class="pb-2 pe-2 mt-5 flex h-[10px] justify-end">
            <x-settings::action-message class="" on="saved">
                {{ __('Saved.') }}
            </x-settings::action-message>
        </div>
    </x-slot>
</x-settings::action-section>
