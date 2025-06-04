<?php

declare(strict_types=1);

namespace Modules\Browser\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

final class LikeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Browser\Models\Like::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
