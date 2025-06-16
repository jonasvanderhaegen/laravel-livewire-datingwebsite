<?php

declare(strict_types=1);

namespace Modules\Core\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

final class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        return;
        // 1) Determine all shard connections from config
        $shards = array_filter(
            array_keys(config('shard.database.connections')),
            fn (string $name) => Str::startsWith($name, 'user_shard_')
        );

        // 2) For each shard, seed 50 users (for example)
        foreach ($shards as $shard) {
            $this->command->info("Seeding users on shard: {$shard}");

            // Drop existing connection and set default to this shard
            DB::purge($shard);
            Config::set('database.default', $shard);

            // Seed users via factory
            User::factory()
                ->count(50)
                ->create();
        }

        // 3) Restore your original default connection
        Config::set('database.default', env('DB_CONNECTION'));
    }
}
