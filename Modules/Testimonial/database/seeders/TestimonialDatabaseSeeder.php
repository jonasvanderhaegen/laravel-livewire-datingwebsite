<?php

declare(strict_types=1);

namespace Modules\Testimonial\Database\Seeders;

use Illuminate\Database\Seeder;

final class TestimonialDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            TestimonialSeeder::class,
        ]);
    }
}
