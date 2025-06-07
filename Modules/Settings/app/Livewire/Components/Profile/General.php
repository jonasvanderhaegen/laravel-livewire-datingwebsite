<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Components\Profile;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Masmerise\Toaster\Toaster;
use Modules\Profile\Models\Profile;
use Modules\Settings\Livewire\Forms\Profile\General\BodytypeForm;
use Modules\Settings\Livewire\Forms\Profile\General\ChildForm;
use Modules\Settings\Livewire\Forms\Profile\General\DietForm;
use Modules\Settings\Livewire\Forms\Profile\General\DrinkForm;
use Modules\Settings\Livewire\Forms\Profile\General\DrugsForm;
use Modules\Settings\Livewire\Forms\Profile\General\EducationForm;
use Modules\Settings\Livewire\Forms\Profile\General\Employmentform;
use Modules\Settings\Livewire\Forms\Profile\General\EthnicityForm;
use Modules\Settings\Livewire\Forms\Profile\General\GenderForm;
use Modules\Settings\Livewire\Forms\Profile\General\LanguageForm;
use Modules\Settings\Livewire\Forms\Profile\General\LookForm;
use Modules\Settings\Livewire\Forms\Profile\General\OrientationForm;
use Modules\Settings\Livewire\Forms\Profile\General\PetForm;
use Modules\Settings\Livewire\Forms\Profile\General\PoliticsForm;
use Modules\Settings\Livewire\Forms\Profile\General\PronounForm;
use Modules\Settings\Livewire\Forms\Profile\General\RelationshipForm;
use Modules\Settings\Livewire\Forms\Profile\General\ReligionForm;
use Modules\Settings\Livewire\Forms\Profile\General\SmokeForm;
use Modules\Settings\Livewire\Forms\Profile\General\ZodiacForm;

// @codeCoverageIgnoreStart
final class General extends Component
{
    public string $activeTab = 'gender';

    public int $userId;

    // Form properties
    public LookForm $lookForm;

    public GenderForm $genderForm;

    public OrientationForm $orientationForm;

    public RelationshipForm $relationshipForm;

    public PronounForm $pronounForm;

    public PetForm $petForm;

    public ChildForm $childForm;

    public DrinkForm $drinkForm;

    public DrugsForm $drugsForm;

    public BodytypeForm $bodytypeForm;

    public DietForm $dietForm;

    public LanguageForm $languageForm;

    public PoliticsForm $politicsForm;

    public EthnicityForm $ethnicityForm;

    public ReligionForm $religionForm;

    public Employmentform $employmentForm;

    public EducationForm $educationForm;

    public SmokeForm $smokeForm;

    public ZodiacForm $zodiacForm;

    /**
     * Save custom pronoun information
     */
    public function saveCustomPronoun(): void
    {
        try {
            $this->pronounForm->validate();

            $this->clearProfileCache();
            if ($this->pronounForm->value === 'custom' && $this->pronounForm->custom_pronouns === null) {

                $this->addError('pronounForm.custom_pronouns', 'Please enter a custom pronoun.');

                Toaster::error('Please enter a custom pronoun.');

                return;

            }

            $profile = auth()->user()->profile;
            $profile->update([
                'pronouns' => $this->pronounForm->value,
                'custom_pronouns' => $this->pronounForm->custom_pronouns,
            ]);
            if (! auth()->user()->hasCompletedOnboarding()) {
                $this->dispatch('profileChanged', 'pronouns', true);
            }
            $this->dispatch('saved');
        } catch (ValidationException $e) {
            ray($e->getMessage());
        }
    }

    /**
     * Initialize component state
     */
    public function mount(): void
    {
        $this->userId = (int) auth()->id();

        $profile = $this->profile();

        // Simple value properties
        $this->initializeFormValues($profile, [
            'pronounForm' => [
                'value' => 'pronouns', 'custom_pronouns' => 'custom_pronouns', 'prefer_not_say' => 'pronouns_notsay',
            ],
            'relationshipForm' => ['value' => 'relationship_type'],
            'childForm' => ['value' => 'children', 'prefer_not_say' => 'children_notsay'],
            'politicsForm' => ['value' => 'politics', 'prefer_not_say' => 'politics_notsay'],
            'educationForm' => ['value' => 'education', 'prefer_not_say' => 'education_notsay'],
            'employmentForm' => ['value' => 'employment', 'prefer_not_say' => 'employment_notsay'],
            'dietForm' => ['value' => 'diet', 'prefer_not_say' => 'diet_notsay'],
            'religionForm' => ['value' => 'religion', 'prefer_not_say' => 'religion_notsay'],
            'drugsForm' => ['value' => 'drugs', 'prefer_not_say' => 'drugs_notsay'],
            'smokeForm' => ['value' => 'smoke', 'prefer_not_say' => 'smoke_notsay'],
            'drinkForm' => ['value' => 'drink', 'prefer_not_say' => 'drink_notsay'],
        ]);

        // Collection properties
        $this->ethnicityForm->ethnicities = $profile->ethnicities->pluck('id');
        $this->ethnicityForm->prefer_not_say = $profile->ethnicity_notsay;

        $this->languageForm->languages = $profile->languages->pluck('id');
        $this->languageForm->prefer_not_say = $profile->language_notsay;

        $this->petForm->pets = $profile->pets->pluck('id');
        $this->petForm->prefer_not_say = $profile->pets_notsay;

        $this->genderForm->genders = $profile->genders->pluck('id');

        $this->orientationForm->orientations = $profile->orientations->pluck('id');
        $this->orientationForm->prefer_not_say = $profile->orientations_notsay;

        if (! auth()->user()->hasCompletedOnboarding()) {
            $this->dispatch('sendMountedData', [
                'genders' => $this->genderForm->genders->count(),
                'orientations' => $this->orientationForm->orientations->count(),
                'orientations_notsay' => $this->orientationForm->prefer_not_say,
                'pronouns' => ($this->pronounForm->value === 'custom') ? $this->pronounForm->custom_pronouns : $this->pronounForm->value,
                'pronouns_notsay' => $this->pronounForm->prefer_not_say,
                'relationshipType' => $this->relationshipForm->value,
            ]);
        }
    }

    #[Computed('profile')]
    public function profile(): Profile
    {
        return cache()->rememberForever(
            $this->getProfileCacheKey(),
            fn () => auth()->user()->profile()
                ->with([
                    'languages:id,identifier',
                    'ethnicities:id,identifier',
                    'pets:id,identifier',
                    'genders:id,identifier',
                    'orientations:id,identifier',
                ])
                ->select([
                    'id',
                    'pets_notsay',
                    'language_notsay',
                    'ethnicity_notsay',
                    'pronouns',
                    'custom_pronouns',
                    'pronouns_notsay',
                    'relationship_type',
                    'children',
                    'children_notsay',
                    'orientations_notsay',
                    'drugs',
                    'drugs_notsay',
                    'drink',
                    'drink_notsay',
                    'smoke',
                    'smoke_notsay',
                    'zodiac_notsay',
                    'religion',
                    'religion_notsay',
                    'employment',
                    'employment_notsay',
                    'education',
                    'education_notsay',
                    'diet',
                    'diet_notsay',
                    'politics',
                    'politics_notsay',
                    'bodytype_notsay',
                    'height_notsay',
                ])->first()
        );
    }

    public function updated(string $field, mixed $value): void
    {
        // Skip tabs field
        if ($field === 'tabs') {
            return;
        }

        // Handle the gender form
        if (Str::contains($field, 'genderForm')) {

            if (! auth()->user()->hasCompletedOnboarding()) {
                $this->dispatch('profileChanged', 'genders', $this->genderForm->genders->count());
            }

            $this->genderForm->validate();
            $this->clearProfileCache();
            $profile = auth()->user()->profile;
            $profile->genders()->sync($this->genderForm->genders->toArray());
            $this->dispatch('saved');

            return;
        }

        // Handle prefer_not_say updates
        if (Str::endsWith($field, 'prefer_not_say')) {
            $this->handlePreferNotSay($field, $value);

            return;
        }

        // Handle regular form value updates
        if (Str::endsWith($field, 'value') && $value) {
            $this->handleFormValueUpdate($field, $value);

            return;
        }

        // Handle multi-select form updates (orientations, languages, ethnicities)
        $this->handleMultiSelectFormUpdate($field, $value);
    }

    /**
     * Render the component
     */
    public function render(): View
    {
        // Convert config options to collections of objects
        $configItems = [
            'pronouns' => 'pronouns',
            'types' => 'relationship_type',
            'genders' => 'genders',
            'orientations' => 'orientations',
            'pets' => 'pets',
            'children' => 'children',
            'diet' => 'diet',
            'politics' => 'politics',
            'education' => 'education',
            'ethnicities' => 'ethnicities',
            'languages' => 'languages',
            'employment' => 'employment',
            'religion' => 'religion',
            'smoke' => 'smoke',
            'drink' => 'drink',
            'drugs' => 'drugs',
        ];

        $viewData = [];

        foreach ($configItems as $viewKey => $configKey) {
            /**
             * @var array<int, array{identifier?: string, name: string}> $rawItems
             */
            $rawItems = config("profile.{$configKey}", []);

            /**
             * @var Collection<int, object{identifier?:string,name:string}> $viewData [$viewKey]
             */
            $viewData[$viewKey] = collect($rawItems)
                ->map(fn (array $item): object => (object) $item);
        }

        return view('settings::livewire.components.profile.general', $viewData);
    }

    /**
     * Clear profile cache
     */
    private function clearProfileCache(): void
    {
        cache()->forget($this->getProfileCacheKey());
    }

    /**
     * Get profile cache key
     */
    private function getProfileCacheKey(): string
    {
        return "settings:profile:general:{$this->userId}";
    }

    /**
     * @param  array<string, array<string,string>>  $mappings
     */
    private function initializeFormValues(Profile $profile, array $mappings): void
    {
        foreach ($mappings as $formName => $fields) {
            foreach ($fields as $formField => $profileField) {
                $this->{$formName}->{$formField} = $profile->{$profileField};
            }
        }
    }

    /**
     * Handle "prefer not to say" checkbox updates
     */
    private function handlePreferNotSay(string $field, bool $value = true): void
    {
        $formName = Str::before($field, 'Form');
        $form = $formName.'Form';

        if ($value) {
            $this->clearProfileCache();
        }

        // Map form names to database field names and perform appropriate actions
        $formMappings = [
            'orientation' => [
                'update' => ['orientations_notsay' => true],
                'relation' => 'orientations',
                'clearCollection' => 'orientations',
            ],
            'education' => [
                'update' => ['education_notsay' => true, 'education' => null],
                'clearValue' => true,
            ],
            'drugs' => [
                'update' => ['drugs_notsay' => true, 'drugs' => null],
                'clearValue' => true,
            ],
            'diet' => [
                'update' => ['diet_notsay' => true, 'diet' => null],
                'clearValue' => true,
            ],
            'employment' => [
                'update' => ['employment_notsay' => true, 'employment' => null],
                'clearValue' => true,
            ],
            'pronoun' => [
                'update' => ['pronouns_notsay' => true, 'pronouns' => null, 'custom_pronouns' => null],
                'clearValue' => true,
                'clearCustomPronouns' => true,
            ],
            'pet' => [
                'update' => ['pets_notsay' => true],
                'relation' => 'pets',
                'clearCollection' => 'pets',
            ],
            'politics' => [
                'update' => ['politics_notsay' => true, 'politics' => null],
                'clearValue' => true,
            ],
            'child' => [
                'update' => ['children_notsay' => true, 'children' => null],
                'clearValue' => true,
            ],
            'ethnicity' => [
                'update' => ['ethnicity_notsay' => true],
                'relation' => 'ethnicities',
                'clearCollection' => 'ethnicities',
            ],
            'language' => [
                'update' => ['language_notsay' => true],
                'relation' => 'languages',
                'clearCollection' => 'languages',
            ],
            'drink' => [
                'update' => ['drink_notsay' => true, 'drink' => null],
                'clearValue' => true,
            ],
            'smoke' => [
                'update' => ['smoke_notsay' => true, 'smoke' => null],
                'clearValue' => true,
            ],
            'religion' => [
                'update' => ['religion_notsay' => true, 'religion' => null],
                'clearValue' => true,
            ],
        ];

        if (isset($formMappings[$formName])) {
            $mapping = $formMappings[$formName];

            if ($value === false) {
                $this->dispatch('profileChanged', array_key_first($mapping['update']), false);
                $this->dispatch('profileChanged', $formName.'s', null);

                return;
            }

            // Clear form values if needed
            if (isset($mapping['clearValue'])) {
                $this->{$form}->value = null;

            }

            // Clear custom pronouns if needed
            if (isset($mapping['clearCustomPronouns'])) {
                $this->{$form}->custom_pronouns = null;

            }

            // Clear collection if needed
            if (isset($mapping['clearCollection'])) {
                $this->{$form}->{$mapping['clearCollection']} = collect([]);

            }

            // Update database
            $profile = auth()->user()->profile;
            $profile->update($mapping['update']);

            // Sync relationship if needed
            if (isset($mapping['relation'])) {
                $profile = auth()->user()->profile;
                $profile->{$mapping['relation']}()->sync([]);
            }

            $this->dispatch('profileChanged', array_key_first($mapping['update']), true);
            $this->dispatch('saved');
        }
    }

    private function handleFormValueUpdate(string $field, mixed $value): void
    {
        $formName = Str::before($field, 'Form.value');
        $form = $formName.'Form';

        $this->clearProfileCache();

        // Map form names to database fields and validation requirements
        $formMappings = [
            'pronoun' => [
                'update' => ['pronouns' => $value, 'pronouns_notsay' => false],
                'extraAction' => ($value !== 'custom') ? function () {
                    $profile = auth()->user()->profile;
                    $profile->update(['custom_pronouns' => null]);
                    $this->pronounForm->custom_pronouns = null;
                    if (! auth()->user()->hasCompletedOnboarding()) {
                        $this->dispatch('profileChanged', 'pronouns', true);
                    }
                } : function () {
                    if (! auth()->user()->hasCompletedOnboarding()) {
                        $this->dispatch('profileChanged', 'pronouns', null);
                    }
                },
            ],
            'education' => [
                'update' => ['education' => $value, 'education_notsay' => false],
            ],
            'employment' => [
                'update' => ['employment' => $value, 'employment_notsay' => false],
            ],
            'religion' => [
                'update' => ['religion' => $value, 'religion_notsay' => false],
            ],
            'smoke' => [
                'update' => ['smoke' => $value, 'smoke_notsay' => false],
            ],
            'drink' => [
                'update' => ['drink' => $value, 'drink_notsay' => false],
            ],
            'drugs' => [
                'update' => ['drugs' => $value, 'drugs_notsay' => false],
            ],
            'diet' => [
                'update' => ['diet' => $value, 'diet_notsay' => false],
            ],
            'relationship' => [
                'update' => ['relationship_type' => $value],
                'validate' => true,
            ],
            'child' => [
                'update' => ['children' => $value, 'children_notsay' => false],
                'validate' => true,
            ],
            'politics' => [
                'update' => ['politics' => $value, 'politics_notsay' => false],
                'validate' => true,
            ],
        ];

        if (isset($formMappings[$formName])) {
            $mapping = $formMappings[$formName];

            // Validate if required
            if (isset($mapping['validate'])) {
                $this->{$form}->validate();
            }

            // Update database
            $profile = auth()->user()->profile;
            $profile->update($mapping['update']);

            // Execute any extra actions
            if (isset($mapping['extraAction']) && is_callable($mapping['extraAction'])) {
                $mapping['extraAction']();
            }

            if (! auth()->user()->hasCompletedOnboarding()) {
                if (array_key_first($mapping['update']) === 'relationship_type') {
                    $this->dispatch('profileChanged', 'relationshipType', true);
                }
            }

            $this->dispatch('saved');
        }
    }

    /**
     * @param  int|string  $value  Only integer IDs or string IDs ever arrive here
     */
    private function handleMultiSelectFormUpdate(string $field, int|string $value): void
    {
        // Handle orientation form updates
        if (Str::contains($field, 'orientationForm') && ! $this->orientationForm->prefer_not_say) {

            if (! auth()->user()->hasCompletedOnboarding()) {
                $this->dispatch('profileChanged', 'orientations', $this->orientationForm->orientations->count());
            }

            $this->orientationForm->validate();
            $this->clearProfileCache();
            $profile = auth()->user()->profile;
            $profile->update(['orientations_notsay' => false]);
            // clears cache also because of notsay
            $profile->orientations()->sync($this->orientationForm->orientations->toArray());
            $this->dispatch('saved');

        }

        // Handle ethnicity form updates
        if (Str::contains($field, 'ethnicityForm') && ! $this->ethnicityForm->prefer_not_say) {
            $this->ethnicityForm->validate();
            $this->clearProfileCache();
            $profile = auth()->user()->profile;
            $profile->update(['ethnicity_notsay' => false]);
            $profile->ethnicities()->sync($this->ethnicityForm->ethnicities->toArray());
            $this->dispatch('saved');
        }

        // Handle language form updates
        if (Str::contains($field, 'languageForm') && ! $this->languageForm->prefer_not_say) {
            $this->languageForm->validate();
            $this->clearProfileCache();
            $profile = auth()->user()->profile;
            $profile->update(['language_notsay' => false]);
            $profile->languages()->sync($this->languageForm->languages->toArray());
            $this->dispatch('saved');
        }

        // Handle pet form updates
        if (Str::contains($field, 'petForm') && ! $this->petForm->prefer_not_say) {
            $this->clearProfileCache();

            $valueInt = (int) $value;

            /**
             * After mapping we have a Collection where every element is int.
             *
             * @var Collection<int,int> $pets
             */
            $pets = collect($this->petForm->pets)->map(
                /**
                 * @param  bool|int|string|array<int|string>  $value
                 */
                static fn (array|bool|int|string $value, string $key): int => (int) $value
            );

            if ($valueInt === 1) {
                $pets = collect([1]);
            } else {
                $pets = $pets->reject(fn (int $v): bool => $v === 1);

                if ($pets->count() === 1 && $pets->doesntContain($valueInt)) {
                    // push an int, not a string, so it matches Collection<int,int>
                    $pets->push($valueInt);
                }
            }

            $this->petForm->pets = $pets->values();

            $profile = auth()->user()->profile;
            $profile->update(['pets_notsay' => false]);
            $profile->pets()->sync($this->petForm->pets->toArray());
            $this->dispatch('saved');
        }
    }
}
// @codeCoverageIgnoreEnd
