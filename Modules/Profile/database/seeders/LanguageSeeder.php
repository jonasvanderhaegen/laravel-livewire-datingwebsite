<?php

declare(strict_types=1);

namespace Modules\Profile\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

final class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call([]);
        $values = Arr::pluck(config('profile.languages'), 'identifier');

        // transform to [ ['id'=>0], ['id'=>1], … ]
        $rows = array_map(fn (string $v) => ['identifier' => $v], $values);

        // now insert (or insertIgnore so you don’t get duplicate-key errors)
        DB::table('languages')->insertOrIgnore($rows);
    }
}
