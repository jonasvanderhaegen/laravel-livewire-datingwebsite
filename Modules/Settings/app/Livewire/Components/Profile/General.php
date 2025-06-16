<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Components\Profile;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Component;
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
    public string $activeTab = 'languages';

    public int $profileId;

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
     * Initialize component state
     */
    public function mount(): void
    {
        $shard = session('user_shard');

        $profile = cache()->remember(
            $this->getProfileCacheKey(),
            30,
            fn () => Profile::on($shard)
                ->where('user_id', auth()->id())
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

        $this->profileId = $profile->id;

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

        $this->languageForm->languages = $profile->sharded_languages;
        $this->languageForm->prefer_not_say = $profile->language_notsay;
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

    public function updated(string $field, mixed $value): void
    {
        // Skip tabs field
        if ($field === 'tabs') {
            return;
        }

        if (Str::endsWith($field, 'prefer_not_say')) {
            $this->handlePreferNotSay($field, $value);

            return;
        }

    }

    private function handlePreferNotSay(string $field, bool $value = true): void
    {
        $formName = Str::before($field, 'Form');
        $form = $formName.'Form';

        if ($value) {
            $this->clearProfileCache();
        }

        $shard = session('user_shard');

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
                $this->dispatch('profileChanged', $formName.'s', false);

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
            Profile::on($shard)->whereKey($this->profileId)->update($mapping['update']);

            // Sync relationship if needed
            if (isset($mapping['relation'])) {
                $profile = Profile::on($shard);

                ray($profile);
                //$profile->{$mapping['relation']}()->sync([]);
            }

            $this->dispatch('profileChanged', array_key_first($mapping['update']), true);
            $this->dispatch('saved');
        }
    }

    private function getProfileCacheKey(): string
    {
        return 'settings:profile:general:{auth()->id()}';
    }

    private function clearProfileCache(): void
    {
        cache()->forget($this->getProfileCacheKey());
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
}
// @codeCoverageIgnoreEnd
