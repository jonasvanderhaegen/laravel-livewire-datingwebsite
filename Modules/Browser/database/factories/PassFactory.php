<?php

declare(strict_types=1);

namespace Modules\Browser\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Browser\Models\Pass;

/**
 * @extends Factory<Pass>
 */
final class PassFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Pass>
     */
    protected $model = Pass::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            // …your fake data here…
        ];
    }
}
