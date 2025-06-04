<x-onboarduser::layouts.master>
    <div class="">
        <div class="mt-10 sm:mt-0">
            <x-settings::form-section submit="submitLocation">
                <x-slot name="title">Location</x-slot>

                <x-slot name="description">
                    <div class="inline-flex items-center">
                        <svg
                            @class([
                                'me-2 h-6 w-6',
                                $locationEnabled ? 'text-green-400' : 'text-red-500',
                            ])
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M12 2c-.791 0-1.55.314-2.11.874l-.893.893a.985.985 0 0 1-.696.288H7.04A2.984 2.984 0 0 0 4.055 7.04v1.262a.986.986 0 0 1-.288.696l-.893.893a2.984 2.984 0 0 0 0 4.22l.893.893a.985.985 0 0 1 .288.696v1.262a2.984 2.984 0 0 0 2.984 2.984h1.262c.261 0 .512.104.696.288l.893.893a2.984 2.984 0 0 0 4.22 0l.893-.893a.985.985 0 0 1 .696-.288h1.262a2.984 2.984 0 0 0 2.984-2.984V15.7c0-.261.104-.512.288-.696l.893-.893a2.984 2.984 0 0 0 0-4.22l-.893-.893a.985.985 0 0 1-.288-.696V7.04a2.984 2.984 0 0 0-2.984-2.984h-1.262a.985.985 0 0 1-.696-.288l-.893-.893A2.984 2.984 0 0 0 12 2Zm3.683 7.73a1 1 0 1 0-1.414-1.413l-4.253 4.253-1.277-1.277a1 1 0 0 0-1.415 1.414l1.985 1.984a1 1 0 0 0 1.414 0l4.96-4.96Z"
                                clip-rule="evenodd"
                            />
                        </svg>

                        <span>Precise tracking of your location.</span>
                    </div>
                </x-slot>

                <x-slot name="form">
                    <div class="relative col-span-4 block w-full">
                        <svg
                            @class([
                                'mb-4 h-12 w-12',
                                $locationEnabled ? 'text-green-400' : 'text-red-500',
                            ])
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                clip-rule="evenodd"
                            />
                        </svg>

                        <h1
                            class="leding-tight mb-2 text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white"
                        >
                            @if ($locationEnabled)
                                Location tracking accepted
                            @else
                                    Location tracking not accepted (yet)
                            @endif
                        </h1>

                        <p
                            class="mb-4 font-light text-gray-500 md:mb-6 dark:text-gray-400"
                        >
                            This is required to to ensure all users you live
                            where you say you live.
                            <br />
                            Its sole purpose is to be used as a radius filter.
                            In case this is disabled later you will be asked to
                            enable it again.
                        </p>

                        <p>
                            Click the button to request a prompt, it will show a
                            prompt for the first time to accept or decline
                            sharing your location.
                        </p>
                    </div>
                </x-slot>

                <x-slot name="actions">
                    <x-settings::button
                        wire:click="dispatchToScript"
                        color="primary"
                    >
                        Validate Location tracking permissions
                    </x-settings::button>
                    <x-settings::locationScript />
                </x-slot>
            </x-settings::form-section>
        </div>

        <x-settings::section-border />

        <div class="mt-10 sm:mt-0">
            <x-settings::form-section submit="submitInfo">
                <x-slot name="title">General information</x-slot>

                <x-slot name="description">
                    <div class="inline-flex items-center">
                        <svg
                            @class([
                                'me-2 h-6 w-6',
                                $locationEnabled ? 'text-green-400' : 'text-red-500',
                            ])
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M12 2c-.791 0-1.55.314-2.11.874l-.893.893a.985.985 0 0 1-.696.288H7.04A2.984 2.984 0 0 0 4.055 7.04v1.262a.986.986 0 0 1-.288.696l-.893.893a2.984 2.984 0 0 0 0 4.22l.893.893a.985.985 0 0 1 .288.696v1.262a2.984 2.984 0 0 0 2.984 2.984h1.262c.261 0 .512.104.696.288l.893.893a2.984 2.984 0 0 0 4.22 0l.893-.893a.985.985 0 0 1 .696-.288h1.262a2.984 2.984 0 0 0 2.984-2.984V15.7c0-.261.104-.512.288-.696l.893-.893a2.984 2.984 0 0 0 0-4.22l-.893-.893a.985.985 0 0 1-.288-.696V7.04a2.984 2.984 0 0 0-2.984-2.984h-1.262a.985.985 0 0 1-.696-.288l-.893-.893A2.984 2.984 0 0 0 12 2Zm3.683 7.73a1 1 0 1 0-1.414-1.413l-4.253 4.253-1.277-1.277a1 1 0 0 0-1.415 1.414l1.985 1.984a1 1 0 0 0 1.414 0l4.96-4.96Z"
                                clip-rule="evenodd"
                            />
                        </svg>

                        <span>Your details</span>
                    </div>

                    <p class="text-gray-500">
                        You can adjust these later on your profile.
                    </p>
                </x-slot>

                <x-slot name="form">
                    <div
                        class="col-span-6 flex"
                        x-data="{ activeTab: @entangle('activeTab') }"
                    >
                        <ul
                            id="profile-tabs"
                            class="flex-column space-y col-span-3 mb-4 space-y-1 text-sm font-medium text-gray-500 md:me-4 md:mb-0 dark:text-gray-400"
                        >
                            <li role="presentation">
                                <button
                                    type="button"
                                    class="inline-flex w-full items-center rounded-lg px-4 py-3 hover:bg-gray-100 hover:text-blue-300 dark:hover:bg-gray-700 dark:hover:text-blue-400"
                                    role="tab"
                                    @click="activeTab = 'gender'"
                                    :class="activeTab === 'gender' ? 'bg-blue-600  text-white' : 'bg-slate-50 dark:bg-gray-800'"
                                >
                                    Gender
                                </button>
                            </li>

                            <li role="presentation">
                                <button
                                    type="button"
                                    class="inline-flex w-full items-center rounded-lg px-4 py-3 hover:bg-gray-100 hover:text-blue-300 dark:hover:bg-gray-700 dark:hover:text-blue-400"
                                    @click="activeTab = 'orientation'"
                                    :class="activeTab === 'orientation' ? 'bg-blue-600 text-white' : 'bg-slate-100 dark:bg-gray-800'"
                                >
                                    Orientation
                                </button>
                            </li>

                            <li role="presentation">
                                <button
                                    type="button"
                                    class="inline-flex w-full items-center rounded-lg px-4 py-3 hover:bg-gray-100 hover:text-blue-300 dark:hover:bg-gray-700 dark:hover:text-blue-400"
                                    @click="activeTab = 'relationship'"
                                    :class="activeTab === 'relationship' ? 'bg-blue-600 text-white' : 'bg-slate-100 dark:bg-gray-800'"
                                >
                                    Relationship
                                </button>
                            </li>
                        </ul>

                        <div id="profile-tab-contents" class="h-[780px] w-full">
                            <div
                                x-show="activeTab === 'gender'"
                                class="bg-g text-medium w-full rounded-lg px-6 text-gray-500 dark:bg-gray-800 dark:text-gray-400"
                            >
                                <div class="pb-4 text-center">
                                    <h3
                                        class="text-lg font-bold text-gray-900 dark:text-white"
                                    >
                                        Gender
                                    </h3>

                                    <p class="text-sm">
                                        You can scroll in list below to view
                                        more options
                                    </p>
                                </div>

                                <div
                                    class="h-[450px] overflow-y-scroll border-t border-b border-gray-300 px-0 lg:px-15 dark:border-gray-700"
                                    style="scrollbar-gutter: stable"
                                >
                                    <ul class="">
                                        @foreach ($genders as $gender)
                                            @php
                                                $slug = Str::slug($gender->name);
                                            @endphp

                                            <li>
                                                <input
                                                    type="checkbox"
                                                    id="{{ $slug }}-option"
                                                    wire:model.change="genderForm.genders"
                                                    value="{{ $gender->value }}"
                                                    class="peer hidden"
                                                />
                                                <label
                                                    for="{{ $slug }}-option"
                                                    class="inline-flex w-full cursor-pointer items-center justify-between border-1 border-gray-200 bg-white p-5 text-gray-500 peer-checked:border-blue-600 peer-checked:text-gray-600 hover:bg-gray-50 hover:text-gray-600 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:peer-checked:border-blue-600 dark:peer-checked:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                                >
                                                    <div class="block">
                                                        <div
                                                            class="w-full text-lg font-semibold"
                                                        >
                                                            {{ $gender->name }}
                                                        </div>

                                                        <div
                                                            class="w-full text-sm"
                                                        >
                                                            {{ $gender->description }}
                                                        </div>
                                                    </div>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <h5 class="py-3 text-center">
                                    My pronouns are
                                </h5>

                                <div class="px-0 lg:px-15">
                                    <div
                                        class="flex items-center rounded-sm border border-gray-200 ps-4 dark:border-gray-700"
                                    >
                                        <input
                                            id="bordered-radio-1"
                                            type="radio"
                                            value="he-him"
                                            name="bordered-radio"
                                            wire:model.change="genderForm.pronouns"
                                            class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                        />
                                        <label
                                            for="bordered-radio-1"
                                            class="ms-2 w-full py-4 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >
                                            He / Him
                                        </label>
                                    </div>

                                    <div
                                        class="flex items-center rounded-sm border border-gray-200 ps-4 dark:border-gray-700"
                                    >
                                        <input
                                            id="bordered-radio-2"
                                            type="radio"
                                            value="she-her"
                                            name="bordered-radio"
                                            wire:model.change="genderForm.pronouns"
                                            class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                        />
                                        <label
                                            for="bordered-radio-2"
                                            class="ms-2 w-full py-4 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >
                                            She / Her
                                        </label>
                                    </div>

                                    <div
                                        class="flex items-center rounded-sm border border-gray-200 ps-4 dark:border-gray-700"
                                    >
                                        <input
                                            id="bordered-radio-3"
                                            type="radio"
                                            value="they-them"
                                            name="bordered-radio"
                                            wire:model.change="genderForm.pronouns"
                                            class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                        />
                                        <label
                                            for="bordered-radio-3"
                                            class="ms-2 w-full py-4 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >
                                            They / Them
                                        </label>
                                    </div>

                                    <div
                                        class="mb-6 flex items-center rounded-sm border border-gray-200 ps-4 dark:border-gray-700"
                                    >
                                        <input
                                            id="bordered-radio-4"
                                            type="radio"
                                            value="custom"
                                            name="bordered-radio"
                                            wire:model.change="genderForm.pronouns"
                                            class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
                                        />
                                        <label
                                            for="bordered-radio-4"
                                            class="ms-2 w-full py-4 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >
                                            Enter your own
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div
                                x-show="activeTab === 'orientation'"
                                class="bg-g text-medium w-full rounded-lg px-6 text-gray-500 dark:bg-gray-800 dark:text-gray-400"
                            >
                                <div class="pb-4 text-center">
                                    <h3
                                        class="text-lg font-bold text-gray-900 dark:text-white"
                                    >
                                        Orientation
                                    </h3>

                                    <p class="text-sm">
                                        We use this to provide and personalize
                                        your experience.
                                    </p>
                                </div>

                                <div
                                    class="h-[430px] overflow-y-scroll border-t border-b border-gray-300 px-0 lg:px-15 dark:border-gray-700"
                                    style="scrollbar-gutter: stable"
                                >
                                    <fieldset
                                        @disabled($orientationForm->prefer_not_say)
                                    >
                                        <ul class="">
                                            @foreach ($orientations as $orientation)
                                                @php
                                                    $slug = Str::slug($orientation->name);
                                                @endphp

                                                <li>
                                                    <input
                                                        type="checkbox"
                                                        id="{{ $slug }}-option"
                                                        wire:model.change="orientationForm.orientations"
                                                        value="{{ $orientation->value }}"
                                                        class="peer hidden"
                                                    />
                                                    <label
                                                        for="{{ $slug }}-option"
                                                        @class([
                                                            'inline-flex w-full items-center justify-between border-1 border-gray-200 bg-white p-5 text-gray-500 peer-checked:border-blue-600 peer-checked:text-gray-600 hover:bg-gray-50 hover:text-gray-600 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:peer-checked:border-blue-600 dark:peer-checked:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-gray-300',
                                                            $orientationForm->prefer_not_say ? 'cursor-not-allowed opacity-50' : 'cursor-pointer opacity-100',
                                                        ])
                                                    >
                                                        <div class="block">
                                                            <div
                                                                class="w-full text-lg font-semibold"
                                                            >
                                                                {{ $orientation->name }}
                                                            </div>

                                                            <div
                                                                class="w-full text-sm"
                                                            >
                                                                {{ $orientation->description }}
                                                            </div>
                                                        </div>
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </fieldset>
                                </div>

                                <div
                                    class="flux mb-4 items-center justify-center py-4 text-center"
                                >
                                    <label
                                        class="inline-flex cursor-pointer items-center"
                                    >
                                        <input
                                            type="checkbox"
                                            value=""
                                            class="peer sr-only"
                                            wire:model.change="orientationForm.prefer_not_say"
                                        />
                                        <div
                                            class="peer relative h-6 w-11 rounded-full bg-gray-200 peer-checked:bg-blue-600 peer-focus:ring-4 peer-focus:ring-blue-300 peer-focus:outline-none after:absolute after:start-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:after:translate-x-full peer-checked:after:border-white rtl:peer-checked:after:-translate-x-full dark:border-gray-600 dark:bg-gray-700 dark:peer-checked:bg-blue-600 dark:peer-focus:ring-blue-800"
                                        ></div>
                                        <span
                                            class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >
                                            Prefer not to say
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <div
                                x-show="activeTab === 'relationship'"
                                class="bg-g text-medium w-full rounded-lg px-6 text-gray-500 dark:bg-gray-800 dark:text-gray-400"
                            >
                                <div class="pb-4 text-center">
                                    <h3
                                        class="text-lg font-bold text-gray-900 dark:text-white"
                                    >
                                        Relationship type
                                    </h3>

                                    <p class="text-sm">&nbsp;</p>
                                </div>

                                <div
                                    class="px-0 lg:px-15"
                                    style="scrollbar-gutter: stable"
                                >
                                    <ul class="">
                                        @foreach ($types as $type)
                                            @php
                                                $slug = Str::slug($type->name);
                                            @endphp

                                            <li>
                                                <input
                                                    type="radio"
                                                    id="{{ $slug }}-option"
                                                    wire:model.change="relationshipForm.relationship_type"
                                                    value="{{ $type->value }}"
                                                    class="peer hidden"
                                                />
                                                <label
                                                    for="{{ $slug }}-option"
                                                    @class([
                                                        'inline-flex w-full cursor-pointer items-center justify-between border-1 border-gray-200 bg-white p-5 text-gray-500 peer-checked:border-blue-600 peer-checked:text-gray-600 hover:bg-gray-50 hover:text-gray-600 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:peer-checked:border-blue-600 dark:peer-checked:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-gray-300',
                                                    ])
                                                >
                                                    <div class="block">
                                                        <div
                                                            class="w-full text-lg font-semibold"
                                                        >
                                                            {{ $type->name }}
                                                        </div>

                                                        <div
                                                            class="w-full text-sm"
                                                        >
                                                            {{ $type->description }}
                                                        </div>
                                                    </div>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </x-slot>

                <x-slot name="actions">
                    <x-settings::button type="submit" color="primary">
                        Save
                    </x-settings::button>
                </x-slot>
            </x-settings::form-section>
        </div>
    </div>
</x-onboarduser::layouts.master>
