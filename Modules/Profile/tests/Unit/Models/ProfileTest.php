<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;
use Modules\Profile\Models\Profile;

beforeEach(function () {
    $this->profile = Profile::factory()->create(
        [
            'public' => 1,
            'js_location' => 0,
            'lat' => '12.34',
            'lng' => '56.78',
            'birth_date' => '1991-04-23',
            'ulid' => Str::ulid(),
        ]
    );
});

it('age accessor returns dynamicExtras age', function () {
    expect($this->profile->age)->toBe(34);
});

it('searchableAs returns profiles_index', function () {
    expect((new Profile())->searchableAs())->toBe('profiles_index');
});

it('shouldBeSearchable true only when public and onboarding_complete', function () {
    $user = User::factory()->create(['onboarding_complete' => false]);
    $profile = new Profile(['public' => true]);
    $profile->setRelation('user', $user);
    expect($profile->shouldBeSearchable())->toBeFalse();

    $user->onboarding_complete = true;
    $profile = new Profile(['public' => false]);
    $profile->setRelation('user', $user);
    expect($profile->shouldBeSearchable())->toBeFalse();

    $profile = new Profile(['public' => true]);
    $profile->setRelation('user', $user);
    expect($profile->shouldBeSearchable())->toBeTrue();
});

it('casts attributes to their proper types', function () {
    expect($this->profile->public)->toBeTrue()
        ->and($this->profile->js_location)->toBeFalse()
        ->and($this->profile->lat)->toBeFloat()->toEqual(12.34)
        ->and($this->profile->lng)->toBeFloat()->toEqual(56.78)
        ->and($this->profile->birth_date->format('Y-m-d'))->toEqual('1991-04-23');
});

it('defines the expected relationships', function () {
    expect($this->profile->genders())->toBeInstanceOf(BelongsToMany::class)
        ->and($this->profile->orientations())->toBeInstanceOf(BelongsToMany::class)
        ->and($this->profile->ethnicities())->toBeInstanceOf(BelongsToMany::class)
        ->and($this->profile->languages())->toBeInstanceOf(BelongsToMany::class)
        ->and($this->profile->pets())->toBeInstanceOf(BelongsToMany::class)
        ->and($this->profile->photos())->toBeInstanceOf(HasMany::class)
        ->and($this->profile->interests())->toBeInstanceOf(BelongsToMany::class)
        ->and($this->profile->user())->toBeInstanceOf(BelongsTo::class)
        ->and($this->profile->preferences())->toBeInstanceOf(HasOne::class)
        ->and($this->profile->dynamicExtras())->toBeInstanceOf(HasOne::class);
});

it('builds a full searchable array with all expected keys', function () {
    $array = $this->profile->toSearchableArray();

    $expected = [
        '_geo',
        'first name',
        'last_name',
        'public',
        'ulid',
        'country_id',
        'js_location',
        'relationship_type',
        'custom_pronouns',
        'genders',
        'orientations',
        'orientations_notsay',
        'ethnicities',
        'ethnicity_notsay',
        'languages',
        'language_notsay',
        'pets',
        'pets_notsay',
        'age',
        'drugs',
        'drugs_notsay',
        'drink',
        'drink_notsay',
        'smoke',
        'smoke_notsay',
        'zodiac',
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
        'pronouns',
        'pronouns_notsay',
        'children',
        'children_notsay',
    ];

    foreach ($expected as $key) {
        expect(array_key_exists($key, $array))->toBeTrue("Expected key {$key} to exist");
    }
});
