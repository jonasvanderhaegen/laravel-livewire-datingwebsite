<?php

declare(strict_types=1);

namespace Modules\Profile\Database\Seeders;

use Illuminate\Database\Seeder;

final class ProfileDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            GenderSeeder::class,
            OrientationSeeder::class,
            PetSeeder::class,
            EthnicitySeeder::class,
            LanguageSeeder::class,
        ]);
    }
}
