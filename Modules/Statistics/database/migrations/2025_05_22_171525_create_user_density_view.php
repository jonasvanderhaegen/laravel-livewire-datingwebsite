<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement('DROP VIEW IF EXISTS user_density');

        DB::statement(<<<'SQL'
            CREATE VIEW user_density AS
            SELECT
              -- bucket into grid by rounding
              ROUND(p.lat, 1)  AS lat_bucket,
              ROUND(p.lng, 1) AS lng_bucket,

              -- count how many users in each bucket
              COUNT(*)             AS user_count
            FROM profiles p
            WHERE p.lat IS NOT NULL
              AND p.lng IS NOT NULL
            GROUP BY lat_bucket, lng_bucket;
        SQL
        );
    }

    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS user_density');
    }
};
