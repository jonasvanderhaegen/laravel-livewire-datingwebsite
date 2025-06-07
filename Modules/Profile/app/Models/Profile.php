<?php

declare(strict_types=1);

namespace Modules\Profile\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use Modules\Browser\Models\Pass;
use Modules\Browser\Traits\HasLikes;
use Modules\Profile\Database\Factories\ProfileFactory;
use Modules\Profile\Models\Pivots\EthnicityProfile;
use Modules\Profile\Models\Pivots\GenderProfile;
use Modules\Profile\Models\Pivots\LanguageProfile;
use Modules\Profile\Models\Pivots\OrientationProfile;
use Modules\Profile\Models\Pivots\PetProfile;

/**
 * @template-uses \Illuminate\Database\Eloquent\Factories\HasFactory<\Modules\Profile\Database\Factories\ProfileFactory>
 *
 * @method static \Modules\Profile\Database\Factories\ProfileFactory factory(...$parameters)
 *
 * @property-read Collection|Pass[] $likes
 * @property-read Collection|Profile[] $likedByProfiles
 * @property string $first_name
 * @property string $last_name
 * @property bool $public
 * @property bool $js_location
 * @property float|null $lat
 * @property float|null $lng
 * @property bool $ethnicity_notsay
 * @property bool $language_notsay
 * @property bool $pets_notsay
 * @property bool $orientations_notsay
 * @property bool $children_notsay
 * @property bool $politics_notsay
 * @property bool $education_notsay
 * @property bool $employment_notsay
 * @property bool $diet_notsay
 * @property bool $religion_notsay
 * @property bool $drugs_notsay
 * @property bool $smoke_notsay
 * @property bool $drink_notsay
 * @property bool $zodiac_notsay
 * @property bool $bodytype_notsay
 * @property bool $height_notsay
 * @property bool $pronouns_notsay
 */
final class Profile extends Model
{
    use HasFactory, HasLikes, Searchable;

    public $casts = [
        'public' => 'boolean',
        'js_location' => 'boolean',
        'birth_date' => 'date',
        'orientations_notsay' => 'boolean',
        'pets_notsay' => 'boolean',
        'children_notsay' => 'boolean',
        'drugs_notsay' => 'boolean',
        'smoke_notsay' => 'boolean',
        'zodiac_notsay' => 'boolean',
        'religion_notsay' => 'boolean',
        'employment_notsay' => 'boolean',
        'drink_notsay' => 'boolean',
        'education_notsay' => 'boolean',
        'diet_notsay' => 'boolean',
        'language_notsay' => 'boolean',
        'politics_notsay' => 'boolean',
        'ethnicity_notsay' => 'boolean',
        'bodytype_notsay' => 'boolean',
        'height_notsay' => 'boolean',
        'pronouns_notsay' => 'boolean',
    ];

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'ulid',
        'public',
        'pets_notsay',
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

        'language_notsay',

        'politics',
        'politics_notsay',

        'ethnicity_notsay',

        'bodytype_notsay',
        'height_notsay',

        'pronouns',
        'pronouns_notsay',

        'user_id',
        'lat',
        'lng',
        'birth_date',
        'country_id',
        'js_location',
        'relationship_type',
        'custom_pronouns',
        'children',
    ];

    /**
     * Tell Laravel to use `ulid` for {profile} binding.
     */
    public function getRouteKeyName(): string
    {
        return 'ulid';
    }

    public function shouldBeSearchable(): bool
    {
        return $this->user->onboarding_complete && $this->public;
    }

    public function searchableAs(): string
    {
        return 'profiles_index';
    }

    /**
     * @return array<string, mixed>
     */
    public function toSearchableArray(): array
    {
        return [
            '_geo' => [
                'lat' => $this->lat === null ? 0.0 : (float) $this->lat,
                'lng' => $this->lng === null ? 0.0 : (float) $this->lng,
            ],
            'first name' => $this->first_name,
            'last_name' => $this->last_name,
            'public' => $this->public,
            'ulid' => $this->ulid,
            'country_id' => $this->country_id,
            'js_location' => $this->js_location,
            'relationship_type' => $this->relationship_type,
            'custom_pronouns' => $this->custom_pronouns,

            'genders' => $this->genders()->pluck('identifier')->toArray(),

            'orientations' => $this->orientations()->pluck('identifier')->toArray(),
            'orientations_notsay' => $this->orientations_notsay,

            'ethnicities' => $this->ethnicities()->pluck('identifier')->toArray(),
            'ethnicity_notsay' => $this->ethnicity_notsay,

            'languages' => $this->languages()->pluck('identifier')->toArray(),
            'language_notsay' => $this->language_notsay,

            'pets' => $this->pets()->pluck('identifier')->toArray(),
            'pets_notsay' => $this->pets_notsay,

            'age' => $this->dynamicExtras->age,

            'drugs' => $this->drugs,
            'drugs_notsay' => $this->drugs_notsay,

            'drink' => $this->drink,
            'drink_notsay' => $this->drink_notsay,

            'smoke' => $this->smoke,
            'smoke_notsay' => $this->smoke_notsay,

            'zodiac' => $this->dynamicExtras->zodiac,
            'zodiac_notsay' => $this->zodiac_notsay,

            'religion' => $this->religion,
            'religion_notsay' => $this->religion_notsay,

            'employment' => $this->employment,
            'employment_notsay' => $this->employment_notsay,

            'education' => $this->education,
            'education_notsay' => $this->education_notsay,

            'diet' => $this->diet,
            'diet_notsay' => $this->diet_notsay,

            'politics' => $this->politics,
            'politics_notsay' => $this->politics_notsay,

            'bodytype_notsay' => $this->bodytype_notsay,
            'height_notsay' => $this->height_notsay,

            'pronouns' => $this->pronouns,
            'pronouns_notsay' => $this->pronouns_notsay,

            'children' => $this->children,
            'children_notsay' => $this->children_notsay,

        ];
    }

    /**
     * @return BelongsToMany<Gender, $this, GenderProfile>
     */
    public function genders(): BelongsToMany
    {
        return $this->belongsToMany(Gender::class)
            ->using(GenderProfile::class);
    }

    /**
     * @return BelongsToMany<Orientation, $this, OrientationProfile>
     */
    public function orientations(): BelongsToMany
    {
        return $this->belongsToMany(Orientation::class)
            ->using(OrientationProfile::class);
    }

    /**
     * @return BelongsToMany<Ethnicity, $this, EthnicityProfile>
     */
    public function ethnicities(): BelongsToMany
    {
        return $this->belongsToMany(Ethnicity::class)
            ->using(EthnicityProfile::class);
    }

    /**
     * @return BelongsToMany<Language, $this, LanguageProfile>
     */
    public function languages(): BelongsToMany
    {
        return $this->belongsToMany(Language::class)
            ->using(LanguageProfile::class);
    }

    /**
     * @return BelongsToMany<Pet, $this, PetProfile>
     */
    public function pets(): BelongsToMany
    {
        return $this->belongsToMany(Pet::class)
            ->using(PetProfile::class);
    }

    /**
     * @return HasMany<Photo, $this>
     */
    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class);
    }

    /**
     * @return BelongsToMany<Interest, $this>
     */
    public function interests(): BelongsToMany
    {
        return $this->belongsToMany(Interest::class);
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasOne<Preference, $this>
     */
    public function preferences(): HasOne
    {
        return $this->hasOne(Preference::class);
    }

    /**
     * @return HasOne<ProfileDynamicExtra, $this>
     */
    public function dynamicExtras(): HasOne
    {
        return $this->hasOne(ProfileDynamicExtra::class);
    }

    protected static function newFactory(): ProfileFactory
    {
        return ProfileFactory::new();
    }

    protected static function booted(): void
    {
        self::creating(function (Profile $profile) {
            // only set it if it isn't already set
            if (empty($profile->ulid)) {
                $profile->ulid = (string) Str::ulid();
            }
        });

        self::saved(function (self $profile) {
            $data = Cache::forget("profile.route.ulid.{$profile->ulid}");
        });
    }

    /**
     * @return Attribute<string, mixed>
     */
    protected function name(): Attribute
    {
        return Attribute::make(get: fn () => $this->user->name);
    }

    /**
     * @return Attribute<string, mixed>
     */
    protected function age(): Attribute
    {
        return Attribute::make(get: fn () => $this->dynamicExtras->age);
    }

    /**
     * @return Attribute<string, mixed>
     */
    protected function birthDateFormatted(): Attribute
    {
        return Attribute::make(get: fn () => $this->birth_date?->format('d-m-Y'));
    }

    protected function loadForBinding(string $field, int|string $value): self
    {
        return $this->newQuery()
            ->with([
                'dynamicExtras:profile_id,age,zodiac',
                'photos:id,url,primary',
                'languages:identifier',
                'ethnicities:identifier',
                'pets:identifier',
                'genders:identifier',
                'orientations:identifier',
            ])
            ->select([
                'id', 'user_id', 'birth_date',
                'first_name', 'last_name', 'public',
                'pets_notsay', 'language_notsay', 'ethnicity_notsay',
                'pronouns', 'custom_pronouns', 'pronouns_notsay',
                'relationship_type', 'children', 'children_notsay',
                'orientations_notsay', 'drugs', 'drugs_notsay',
                'drink', 'drink_notsay', 'smoke', 'smoke_notsay',
                'zodiac_notsay', 'religion', 'religion_notsay',
                'employment', 'employment_notsay', 'education',
                'education_notsay', 'diet', 'diet_notsay',
                'politics', 'politics_notsay', 'bodytype_notsay',
                'height_notsay',
            ])
            ->where($field, $value)
            ->first()
            ?? throw (new ModelNotFoundException)->setModel(self::class);
    }
}
