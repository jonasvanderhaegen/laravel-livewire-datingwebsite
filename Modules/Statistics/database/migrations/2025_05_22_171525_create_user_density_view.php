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
            SELECT lat_bucket, lng_bucket, SUM(user_count) AS user_count
              FROM user_density_aggregated
             GROUP BY lat_bucket, lng_bucket;
        SQL
        );
    }

    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS user_density');
    }
};
