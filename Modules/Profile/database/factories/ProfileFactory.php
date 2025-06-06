<?php

declare(strict_types=1);

namespace Modules\Profile\Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Modules\Profile\Models\Profile;

final class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $faker = $this->faker;

        // JS location flag
        $jsLocation = $faker->randomElement([0, 1]);

        // Helper to pick a nullable config value

        $pickNullable = fn (string $configKey, bool $notSay) => $notSay
            ? null
            : $faker->randomElement(range(1, count(config("profile.{$configKey}"))));

        // $pickNullable = fn (string $configKey, bool $notSay) => ray($configKey);

        // Single-value fields with "prefer not say"
        $childrenNotSay = $faker->boolean(30);
        $dietNotSay = $faker->boolean(30);
        $drinkNotSay = $faker->boolean(30);
        $drugsNotSay = $faker->boolean(30);
        $smokeNotSay = $faker->boolean(30);
        $religionNotSay = $faker->boolean(30);
        $employmentNotSay = $faker->boolean(30);
        $educationNotSay = $faker->boolean(30);
        $politicsNotSay = $faker->boolean(30);
        $bodytypeNotSay = $faker->boolean(30);
        $heightNotSay = $faker->boolean(30);
        $pronounsNotSay = $faker->boolean(30);
        $zodiacNotSay = $faker->boolean(30);
        $orientationsNotSay = $faker->boolean(30);
        $petsNotSay = $faker->boolean(30);
        $ethnicitiesNotSay = $faker->boolean(30);
        $languagesNotSay = $faker->boolean(30);
        $public = $faker->boolean(50);

        // Pronouns special handling
        if ($pronounsNotSay) {
            $pronouns = null;
            $customPronouns = null;
        } else {
            $pronounsConfig = config('profile.pronouns');
            $ids = array_column($pronounsConfig, 'identifier');
            $pronouns = $faker->randomElement($ids);
            $customPronouns = $pronouns === 'custom'
                ? $faker->words(2, true)
                : null;
        }

        return [
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'user_id' => User::factory(),
            'ulid' => Str::ulid(),
            'public' => $public,
            'js_location' => $jsLocation,

            'zodiac_notsay' => $zodiacNotSay,
            'pets_notsay' => $petsNotSay,
            'orientations_notsay' => $orientationsNotSay,
            'ethnicity_notsay' => $ethnicitiesNotSay,

            'children_notsay' => $childrenNotSay,
            'children' => $pickNullable('children', $childrenNotSay),

            'diet_notsay' => $dietNotSay,
            'diet' => $pickNullable('diet', $dietNotSay),

            'drink_notsay' => $drinkNotSay,
            'drink' => $pickNullable('drink', $drinkNotSay),

            'drugs_notsay' => $drugsNotSay,
            'drugs' => $pickNullable('drugs', $drugsNotSay),

            'smoke_notsay' => $smokeNotSay,
            'smoke' => $pickNullable('smoke', $smokeNotSay),

            'religion_notsay' => $religionNotSay,
            'religion' => $pickNullable('religion', $religionNotSay),

            'employment_notsay' => $employmentNotSay,
            'employment' => $pickNullable('employment', $employmentNotSay),

            'education_notsay' => $educationNotSay,
            'education' => $pickNullable('education', $educationNotSay),

            'language_notsay' => $languagesNotSay,

            'politics_notsay' => $politicsNotSay,
            'politics' => $pickNullable('politics', $politicsNotSay),

            'bodytype_notsay' => $bodytypeNotSay,
            'bodytype' => $pickNullable('body_types', $bodytypeNotSay),

            'height_notsay' => $heightNotSay,
            'height' => $heightNotSay
                ? null
                : $faker->numberBetween(140, 200),

            'pronouns_notsay' => $pronounsNotSay,
            'pronouns' => $pronouns,
            'custom_pronouns' => $customPronouns,

            'relationship_type' => $faker->randomElement(range(1, count(config('profile.relationship_type')))),

            'birth_date' => $faker->dateTimeBetween('-80 years', '-18 years')->format('Y-m-d'),
            'country_id' => $faker->countryCode,
            'lat' => $faker->latitude,
            'lng' => $faker->longitude,
        ];
    }

    public function configure(): self
    {
        return $this->afterCreating(function (Profile $profile) {
            // Delete any other “empty” profile for this user, so that
            // $user->profile() will point at *this* one from now on:
            $user = $profile->user;
            $user->profile()
                ->where('id', '!=', $profile->id)
                ->delete();
        });
    }
}
