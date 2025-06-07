<?php

declare(strict_types=1);

namespace Modules\Browser\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Browser\Models\Like;

/**
 * @extends Factory<Like>
 */
final class LikeFactory extends Factory
{
    /**
     * @var class-string<Like>
     */
    protected $model = Like::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
