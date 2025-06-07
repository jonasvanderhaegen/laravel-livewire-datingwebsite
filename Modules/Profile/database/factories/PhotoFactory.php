<?php

namespace Modules\Profile\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Modules\Profile\Models\Photo;
use Modules\Profile\Models\Profile;

/**
 * @extends Factory<Photo>
 */
class PhotoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Photo::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'ulid' => (string) Str::ulid(),
            'profile_id' => Profile::factory(),
            'url' => $this->faker->imageUrl(640, 480, 'people'),
            'primary' => $this->faker->boolean(20),
        ];
    }
}

