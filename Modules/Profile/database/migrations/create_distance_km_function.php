<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::getConnection()->getDriverName() === 'mysql') {

            // Drop if it already exists
            DB::unprepared('DROP FUNCTION IF EXISTS distance_km;');

            // Create the function
            DB::unprepared(<<<'SQL'
                CREATE FUNCTION distance_km(
                    lat1 DECIMAL(10,7),
                    lng1 DECIMAL(10,7),
                    lat2 DECIMAL(10,7),
                    lng2 DECIMAL(10,7)
                ) RETURNS DOUBLE
                DETERMINISTIC
                BEGIN
                    RETURN 6371 * ACOS(
                        COS(RADIANS(lat1)) * COS(RADIANS(lat2))
                      * COS(RADIANS(lng2) - RADIANS(lng1))
                      + SIN(RADIANS(lat1)) * SIN(RADIANS(lat2))
                    );
                END;
                SQL
            );
        }
    }

    public function down(): void
    {
        DB::unprepared('DROP FUNCTION IF EXISTS distance_km;');
    }
};
