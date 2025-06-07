<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Profile\Models\Profile;
use Spatie\LaravelPasskeys\Models\Passkey;

final class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(2)
            ->verifiedAndOnboarded()
            ->has(Passkey::factory())
            ->has(Profile::factory())
            ->create();
    }
}
