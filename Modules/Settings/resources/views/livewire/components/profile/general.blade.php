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
                    title="Gender"
                    activeTab="gender"
                >
                    <x-settings::profile-settings-tab-selected-value
                        :form="$genderForm"
                    />
                </x-settings::profile-settings-tab>

                <x-settings::profile-settings-tab
                    title="Orientation"
                    activeTab="orientation"
                >
                    <x-settings::profile-settings-tab-selected-value
                        :form="$orientationForm"
                    />
                </x-settings::profile-settings-tab>

                <x-settings::profile-settings-tab
                    title="Pronouns"
                    activeTab="pronouns"
                >
                    <x-settings::profile-settings-tab-selected-value
                        :form="$pronounForm"
                    />
                </x-settings::profile-settings-tab>

                <x-settings::profile-settings-tab
                    title="Relationship"
                    activeTab="relationship"
                >
                    <x-settings::profile-settings-tab-selected-value
                        :form="$relationshipForm"
                    />
                </x-settings::profile-settings-tab>

                @can('comment', Profile::class)
                    <x-settings::profile-settings-tab
                        title="Looks"
                        activeTab="looks"
                    >
                        Chubby, 184cm
                    </x-settings::profile-settings-tab>

                    <x-settings::profile-settings-tab
                        title="Ethnicity"
                        activeTab="ethnicity"
                    >
                        <x-settings::profile-settings-tab-selected-value
                            :form="$ethnicityForm"
                        />
                    </x-settings::profile-settings-tab>

                    <x-settings::profile-settings-tab
                        title="Politics"
                        activeTab="politics"
                    >
                        <x-settings::profile-settings-tab-selected-value
                            :form="$politicsForm"
                        />
                    </x-settings::profile-settings-tab>

                    <x-settings::profile-settings-tab
                        title="Language(s)"
                        activeTab="languages"
                    >
                        <x-settings::profile-settings-tab-selected-value
                            :form="$languageForm"
                        />
                    </x-settings::profile-settings-tab>

                    <x-settings::profile-settings-tab
                        title="Education"
                        activeTab="education"
                    >
                        <x-settings::profile-settings-tab-selected-value
                            :form="$educationForm"
                        />
                    </x-settings::profile-settings-tab>

                    <x-settings::profile-settings-tab
                        title="Employment"
                        activeTab="employment"
                    >
                        <x-settings::profile-settings-tab-selected-value
                            :form="$employmentForm"
                        />
                    </x-settings::profile-settings-tab>

                    <x-settings::profile-settings-tab
                        title="Religion"
                        activeTab="religion"
                    >
                        <x-settings::profile-settings-tab-selected-value
                            :form="$religionForm"
                        />
                    </x-settings::profile-settings-tab>

                    <x-settings::profile-settings-tab
                        title="Smoke"
                        activeTab="smoke"
                    >
                        <x-settings::profile-settings-tab-selected-value
                            :form="$smokeForm"
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

                    <x-settings::profile-settings-tab
                        title="Drugs"
                        activeTab="drugs"
                    >
                        <x-settings::profile-settings-tab-selected-value
                            :form="$drugsForm"
                        />
                    </x-settings::profile-settings-tab>

                    <x-settings::profile-settings-tab
                        title="Diet"
                        activeTab="diet"
                    >
                        <x-settings::profile-settings-tab-selected-value
                            :form="$dietForm"
                        />
                    </x-settings::profile-settings-tab>

                    <x-settings::profile-settings-tab
                        title="Children"
                        activeTab="children"
                    >
                        <x-settings::profile-settings-tab-selected-value
                            :form="$childForm"
                        />
                    </x-settings::profile-settings-tab>

                    <x-settings::profile-settings-tab
                        title="Pets"
                        activeTab="pets"
                    >
                        <x-settings::profile-settings-tab-selected-value
                            :form="$petForm"
                        />
                    </x-settings::profile-settings-tab>
                @endcan
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

                <x-settings::profile-settings-tab-panel
                    title="Religion"
                    activeTab="religion"
                    description="Tell us about your religion"
                    notsay="religionForm"
                >
                    <x-slot name="content">
                        <fieldset @disabled($religionForm->prefer_not_say)>
                            <ul class="">
                                @foreach ($religion as $religion)
                                    <li>
                                        <x-settings::input-box
                                            :option="$religion"
                                            :value="$loop->iteration"
                                            model="religionForm.value"
                                            type="radio"
                                            :notsay="$religionForm->prefer_not_say"
                                        />
                                    </li>
                                @endforeach
                            </ul>
                        </fieldset>
                    </x-slot>
                </x-settings::profile-settings-tab-panel>

                <x-settings::profile-settings-tab-panel
                    title="Smoke"
                    activeTab="smoke"
                    description="Tell us about your drugs"
                    notsay="smokeForm"
                >
                    <x-slot name="content">
                        <fieldset @disabled($smokeForm->prefer_not_say)>
                            <ul class="">
                                @foreach ($smoke as $d)
                                    <li>
                                        <x-settings::input-box
                                            :option="$d"
                                            :value="$loop->iteration"
                                            model="smokeForm.value"
                                            type="radio"
                                            :notsay="$smokeForm->prefer_not_say"
                                        />
                                    </li>
                                @endforeach
                            </ul>
                        </fieldset>
                    </x-slot>
                </x-settings::profile-settings-tab-panel>

                <x-settings::profile-settings-tab-panel
                    title="drugs"
                    activeTab="drugs"
                    description="Tell us about your drugs"
                    notsay="drugsForm"
                >
                    <x-slot name="content">
                        <fieldset @disabled($drugsForm->prefer_not_say)>
                            <ul class="">
                                @foreach ($drugs as $d)
                                    <li>
                                        <x-settings::input-box
                                            :option="$d"
                                            :value="$loop->iteration"
                                            model="drugsForm.value"
                                            type="radio"
                                            :notsay="$drugsForm->prefer_not_say"
                                        />
                                    </li>
                                @endforeach
                            </ul>
                        </fieldset>
                    </x-slot>
                </x-settings::profile-settings-tab-panel>

                <x-settings::profile-settings-tab-panel
                    title="Looks"
                    activeTab="looks"
                    description="Tell us about your appearance"
                >
                    <x-slot name="content"></x-slot>
                </x-settings::profile-settings-tab-panel>

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
                    title="Ethnicity"
                    activeTab="ethnicity"
                    description="Tell us about your ethnicity"
                    notsay="ethnicityForm"
                >
                    <x-slot name="content">
                        <fieldset @disabled($ethnicityForm->prefer_not_say)>
                            <ul class="">
                                @foreach ($ethnicities as $ethnicity)
                                    <li>
                                        <x-settings::input-box
                                            :option="$ethnicity"
                                            :value="$loop->iteration"
                                            model="ethnicityForm.ethnicities"
                                            type="checkbox"
                                            :notsay="$ethnicityForm->prefer_not_say"
                                        />
                                    </li>
                                @endforeach
                            </ul>
                        </fieldset>
                    </x-slot>
                </x-settings::profile-settings-tab-panel>

                <x-settings::profile-settings-tab-panel
                    title="Diet"
                    activeTab="diet"
                    description="Tell us about your diet"
                    notsay="dietForm"
                >
                    <x-slot name="content">
                        <fieldset @disabled($dietForm->prefer_not_say)>
                            <ul class="">
                                @foreach ($diet as $diet)
                                    <li>
                                        <x-settings::input-box
                                            :option="$diet"
                                            :value="$loop->iteration"
                                            model="dietForm.value"
                                            type="radio"
                                            :notsay="$dietForm->prefer_not_say"
                                        />
                                    </li>
                                @endforeach
                            </ul>
                        </fieldset>
                    </x-slot>
                </x-settings::profile-settings-tab-panel>

                <x-settings::profile-settings-tab-panel
                    title="Children"
                    description="Tell us about your children"
                    activeTab="children"
                    notsay="childForm"
                >
                    <x-slot name="content">
                        <fieldset @disabled($childForm->prefer_not_say)>
                            <ul class="">
                                @foreach ($children as $child)
                                    <li>
                                        <x-settings::input-box
                                            :option="$child"
                                            :value="$loop->iteration"
                                            model="childForm.value"
                                            type="radio"
                                            :notsay="$childForm->prefer_not_say"
                                        />
                                    </li>
                                @endforeach
                            </ul>
                        </fieldset>
                    </x-slot>
                </x-settings::profile-settings-tab-panel>

                <x-settings::profile-settings-tab-panel
                    title="Politics"
                    description="Tell us about your politic view"
                    activeTab="politics"
                    notsay="politicsForm"
                >
                    <x-slot name="content">
                        <fieldset @disabled($politicsForm->prefer_not_say)>
                            <ul class="">
                                @foreach ($politics as $option)
                                    <li>
                                        <x-settings::input-box
                                            :option="$option"
                                            :value="$loop->iteration"
                                            model="politicsForm.value"
                                            type="radio"
                                            :notsay="$politicsForm->prefer_not_say"
                                        />
                                    </li>
                                @endforeach
                            </ul>
                        </fieldset>
                    </x-slot>
                </x-settings::profile-settings-tab-panel>

                <x-settings::profile-settings-tab-panel
                    title="Education"
                    description="Tell us about your education"
                    activeTab="education"
                    notsay="educationForm"
                >
                    <x-slot name="content">
                        <fieldset @disabled($educationForm->prefer_not_say)>
                            <ul class="">
                                @foreach ($education as $option)
                                    <li>
                                        <x-settings::input-box
                                            :option="$option"
                                            :value="$loop->iteration"
                                            model="educationForm.value"
                                            type="radio"
                                            :notsay="$educationForm->prefer_not_say"
                                        />
                                    </li>
                                @endforeach
                            </ul>
                        </fieldset>
                    </x-slot>
                </x-settings::profile-settings-tab-panel>

                <x-settings::profile-settings-tab-panel
                    title="Employment"
                    description="Tell us about your employment"
                    activeTab="employment"
                    notsay="employmentForm"
                >
                    <x-slot name="content">
                        <fieldset @disabled($employmentForm->prefer_not_say)>
                            <ul class="">
                                @foreach ($employment as $option)
                                    <li>
                                        <x-settings::input-box
                                            :option="$option"
                                            :value="$loop->iteration"
                                            model="employmentForm.value"
                                            type="radio"
                                            :notsay="$employmentForm->prefer_not_say"
                                        />
                                    </li>
                                @endforeach
                            </ul>
                        </fieldset>
                    </x-slot>
                </x-settings::profile-settings-tab-panel>

                <x-settings::profile-settings-tab-panel
                    title="Pronouns"
                    activeTab="pronouns"
                    notsay="pronounForm"
                >
                    <x-slot name="description">Lorem ipsum</x-slot>

                    <x-slot name="content">
                        <fieldset @disabled($pronounForm->prefer_not_say)>
                            <ul class="">
                                @foreach ($pronouns as $pronoun)
                                    <li>
                                        <x-settings::input-box
                                            :value="$pronoun->identifier"
                                            :option="$pronoun"
                                            model="pronounForm.value"
                                            type="radio"
                                            :notsay="$pronounForm->prefer_not_say"
                                        />
                                    </li>
                                @endforeach
                            </ul>
                        </fieldset>

                        @if ($pronounForm->value === 'custom')
                            <form
                                wire:submit.prevent="saveCustomPronoun"
                                class="flex grid grid-cols-12 items-center justify-between gap-4"
                            >
                                <x-flowbite::input.text-field
                                    field="pronounForm.custom_pronouns"
                                    label="Custom"
                                    divclass="mt-8 mb-4 col-span-6"
                                    helper="Enter your own pronouns"
                                />
                                <x-settings::secondary-button
                                    type="submit"
                                    class="col-span-3 flex justify-center py-4"
                                >
                                    <span>Save</span>
                                </x-settings::secondary-button>
                            </form>
                        @endif
                    </x-slot>
                </x-settings::profile-settings-tab-panel>

                <x-settings::profile-settings-tab-panel
                    title="Gender"
                    activeTab="gender"
                >
                    <x-slot name="description">
                        @if ($genderForm->genders)
                            You selected {{ $genderForm->selected() }}
                        @else
                                You can scroll in list below to view more
                                options
                        @endif
                    </x-slot>

                    <x-slot name="content">
                        <ul class="">
                            @foreach ($genders as $gender)
                                <li>
                                    <x-settings::input-box
                                        :option="$gender"
                                        :value="$loop->iteration"
                                        model="genderForm.genders"
                                        type="checkbox"
                                    />
                                </li>
                            @endforeach
                        </ul>
                        <x-settings::shade-from-bottom />
                    </x-slot>
                </x-settings::profile-settings-tab-panel>

                <x-settings::profile-settings-tab-panel
                    title="Orientation"
                    activeTab="orientation"
                    notsay="orientationForm"
                >
                    <x-slot name="description">
                        @if ($orientationForm->orientations)
                            You selected
                            {{ $orientationForm->selected() }}
                        @else
                                You can scroll in list below to view more
                                options
                        @endif
                    </x-slot>

                    <x-slot name="content">
                        <fieldset @disabled($orientationForm->prefer_not_say)>
                            <ul class="">
                                @foreach ($orientations as $orientation)
                                    <li>
                                        <x-settings::input-box
                                            :option="$orientation"
                                            :value="$loop->iteration"
                                            model="orientationForm.orientations"
                                            type="checkbox"
                                            :notsay="$orientationForm->prefer_not_say"
                                        />
                                    </li>
                                @endforeach
                            </ul>
                            <x-settings::shade-from-bottom />
                        </fieldset>
                    </x-slot>
                </x-settings::profile-settings-tab-panel>

                <x-settings::profile-settings-tab-panel
                    title="Relationship"
                    activeTab="relationship"
                >
                    <x-slot name="description">Lorem ipsum</x-slot>

                    <x-slot name="content">
                        <ul class="">
                            @foreach ($types as $type)
                                <li>
                                    <x-settings::input-box
                                        :option="$type"
                                        :value="$loop->iteration"
                                        model="relationshipForm.value"
                                        type="radio"
                                    />
                                </li>
                            @endforeach
                        </ul>
                    </x-slot>
                </x-settings::profile-settings-tab-panel>

                <x-settings::profile-settings-tab-panel
                    title="Pets"
                    activeTab="pets"
                    notsay="petForm"
                >
                    <x-slot name="description"></x-slot>

                    <x-slot name="content">
                        <fieldset @disabled($petForm->prefer_not_say)>
                            <ul class="">
                                @foreach ($pets as $pet)
                                    <li>
                                        <x-settings::input-box
                                            :option="$pet"
                                            :value="$loop->iteration"
                                            model="petForm.pets"
                                            type="checkbox"
                                            :notsay="$petForm->prefer_not_say"
                                        />
                                    </li>
                                @endforeach
                            </ul>
                        </fieldset>
                    </x-slot>
                </x-settings::profile-settings-tab-panel>
            </div>
        </div>

        <div class="mt-5 flex h-[10px] justify-end">
            <x-settings::action-message class="" on="saved">
                {{ __('Saved.') }}
            </x-settings::action-message>
        </div>
    </x-slot>
</x-settings::action-section>
