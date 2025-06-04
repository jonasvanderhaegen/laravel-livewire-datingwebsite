<?php

declare(strict_types=1);

namespace Modules\Profile\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

final class PetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Profile\Models\Pet::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
