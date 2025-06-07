<?php

declare(strict_types=1);

namespace Modules\Testimonial\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Testimonial\Models\Testimonial;

/**
 * @extends Factory<Testimonial>
 */
final class TestimonialFactory extends Factory
{
    /**
     * @var class-string<Testimonial>
     */
    protected $model = Testimonial::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
