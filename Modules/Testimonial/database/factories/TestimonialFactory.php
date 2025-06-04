<?php

declare(strict_types=1);

namespace Modules\Testimonial\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

final class TestimonialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Testimonial\Models\Testimonial::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
