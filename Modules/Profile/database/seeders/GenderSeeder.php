<?php

declare(strict_types=1);

namespace Modules\Profile\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

final class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = Arr::pluck(config('profile.genders'), 'identifier');
        $rows = array_map(fn (string $v) => ['identifier' => $v], $values);
        DB::table('genders')->insertOrIgnore($rows);
    }
}
