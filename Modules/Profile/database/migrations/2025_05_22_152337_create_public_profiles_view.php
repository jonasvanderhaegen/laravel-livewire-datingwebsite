<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $driver = Schema::getConnection()->getDriverName();

        //
        // SQLite branch: use strftime()
        //
        if ($driver === 'sqlite') {
            DB::statement(<<<'SQL'
                CREATE VIEW profile_dynamic_extras AS
                SELECT
                  p.id AS profile_id,

                  -- crude age: year difference only
                  (CAST(strftime('%Y','now') AS INTEGER)
                   - CAST(strftime('%Y', p.birth_date) AS INTEGER)
                  ) AS age,

                  -- no zodiac, or simplified CASE using strftime
                  NULL AS zodiac
                FROM profiles p
            SQL
            );

            return;
        }

        //
        // MySQL branch: TIMESTAMPDIFF, MONTH(), DAY()
        //
        if ($driver === 'mysql') {
            // If it already exists, drop it so we can re-create
            DB::statement('DROP VIEW IF EXISTS profile_dynamic_extras');

            DB::statement(<<<'SQL'
            CREATE VIEW profile_dynamic_extras AS
            SELECT
              p.id AS profile_id,

              -- age in years
              TIMESTAMPDIFF(YEAR, p.birth_date, CURDATE()) AS age,

              -- zodiac sign based on birth_date month/day
              CASE
                WHEN (MONTH(p.birth_date) = 3 AND DAY(p.birth_date) >= 21)
                  OR (MONTH(p.birth_date) = 4 AND DAY(p.birth_date) <= 19) THEN 'aries'

                WHEN (MONTH(p.birth_date) = 4 AND DAY(p.birth_date) >= 20)
                  OR (MONTH(p.birth_date) = 5 AND DAY(p.birth_date) <= 20) THEN 'taurus'

                WHEN (MONTH(p.birth_date) = 5 AND DAY(p.birth_date) >= 21)
                  OR (MONTH(p.birth_date) = 6 AND DAY(p.birth_date) <= 20) THEN 'gemini'

                WHEN (MONTH(p.birth_date) = 6 AND DAY(p.birth_date) >= 21)
                  OR (MONTH(p.birth_date) = 7 AND DAY(p.birth_date) <= 22) THEN 'cancer'

                WHEN (MONTH(p.birth_date) = 7 AND DAY(p.birth_date) >= 23)
                  OR (MONTH(p.birth_date) = 8 AND DAY(p.birth_date) <= 22) THEN 'leo'

                WHEN (MONTH(p.birth_date) = 8 AND DAY(p.birth_date) >= 23)
                  OR (MONTH(p.birth_date) = 9 AND DAY(p.birth_date) <= 22) THEN 'virgo'

                WHEN (MONTH(p.birth_date) = 9 AND DAY(p.birth_date) >= 23)
                  OR (MONTH(p.birth_date) = 10 AND DAY(p.birth_date) <= 22) THEN 'libra'

                WHEN (MONTH(p.birth_date) = 10 AND DAY(p.birth_date) >= 23)
                  OR (MONTH(p.birth_date) = 11 AND DAY(p.birth_date) <= 21) THEN 'scorpio'

                WHEN (MONTH(p.birth_date) = 11 AND DAY(p.birth_date) >= 22)
                  OR (MONTH(p.birth_date) = 12 AND DAY(p.birth_date) <= 21) THEN 'sagittarius'

                WHEN (MONTH(p.birth_date) = 12 AND DAY(p.birth_date) >= 22)
                  OR (MONTH(p.birth_date) = 1 AND DAY(p.birth_date) <= 19) THEN 'capricorn'

                WHEN (MONTH(p.birth_date) = 1 AND DAY(p.birth_date) >= 20)
                  OR (MONTH(p.birth_date) = 2 AND DAY(p.birth_date) <= 18) THEN 'aquarius'

                WHEN (MONTH(p.birth_date) = 2 AND DAY(p.birth_date) >= 19)
                  OR (MONTH(p.birth_date) = 3 AND DAY(p.birth_date) <= 20) THEN 'pisces'

                ELSE NULL
              END AS zodiac
            FROM profiles p
            SQL
            );

            return;
        }

        //
        // PostgreSQL branch: date_part('year', age(...)), EXTRACT(MONTH FROM ...), EXTRACT(DAY FROM ...)
        //
        if ($driver === 'pgsql') {
            // Drop if it already exists
            DB::statement('DROP VIEW IF EXISTS profile_dynamic_extras');

            DB::statement(<<<'SQL'
            CREATE VIEW profile_dynamic_extras AS
            SELECT
              p.id AS profile_id,

              -- age in years (integer part of age)
              date_part('year', age(current_date, p.birth_date))::integer AS age,

              -- zodiac sign based on birth_date month/day
              CASE
                WHEN (EXTRACT(MONTH FROM p.birth_date) = 3 AND EXTRACT(DAY FROM p.birth_date) >= 21)
                  OR (EXTRACT(MONTH FROM p.birth_date) = 4 AND EXTRACT(DAY FROM p.birth_date) <= 19) THEN 'aries'

                WHEN (EXTRACT(MONTH FROM p.birth_date) = 4 AND EXTRACT(DAY FROM p.birth_date) >= 20)
                  OR (EXTRACT(MONTH FROM p.birth_date) = 5 AND EXTRACT(DAY FROM p.birth_date) <= 20) THEN 'taurus'

                WHEN (EXTRACT(MONTH FROM p.birth_date) = 5 AND EXTRACT(DAY FROM p.birth_date) >= 21)
                  OR (EXTRACT(MONTH FROM p.birth_date) = 6 AND EXTRACT(DAY FROM p.birth_date) <= 20) THEN 'gemini'

                WHEN (EXTRACT(MONTH FROM p.birth_date) = 6 AND EXTRACT(DAY FROM p.birth_date) >= 21)
                  OR (EXTRACT(MONTH FROM p.birth_date) = 7 AND EXTRACT(DAY FROM p.birth_date) <= 22) THEN 'cancer'

                WHEN (EXTRACT(MONTH FROM p.birth_date) = 7 AND EXTRACT(DAY FROM p.birth_date) >= 23)
                  OR (EXTRACT(MONTH FROM p.birth_date) = 8 AND EXTRACT(DAY FROM p.birth_date) <= 22) THEN 'leo'

                WHEN (EXTRACT(MONTH FROM p.birth_date) = 8 AND EXTRACT(DAY FROM p.birth_date) >= 23)
                  OR (EXTRACT(MONTH FROM p.birth_date) = 9 AND EXTRACT(DAY FROM p.birth_date) <= 22) THEN 'virgo'

                WHEN (EXTRACT(MONTH FROM p.birth_date) = 9 AND EXTRACT(DAY FROM p.birth_date) >= 23)
                  OR (EXTRACT(MONTH FROM p.birth_date) = 10 AND EXTRACT(DAY FROM p.birth_date) <= 22) THEN 'libra'

                WHEN (EXTRACT(MONTH FROM p.birth_date) = 10 AND EXTRACT(DAY FROM p.birth_date) >= 23)
                  OR (EXTRACT(MONTH FROM p.birth_date) = 11 AND EXTRACT(DAY FROM p.birth_date) <= 21) THEN 'scorpio'

                WHEN (EXTRACT(MONTH FROM p.birth_date) = 11 AND EXTRACT(DAY FROM p.birth_date) >= 22)
                  OR (EXTRACT(MONTH FROM p.birth_date) = 12 AND EXTRACT(DAY FROM p.birth_date) <= 21) THEN 'sagittarius'

                WHEN (EXTRACT(MONTH FROM p.birth_date) = 12 AND EXTRACT(DAY FROM p.birth_date) >= 22)
                  OR (EXTRACT(MONTH FROM p.birth_date) = 1 AND EXTRACT(DAY FROM p.birth_date) <= 19) THEN 'capricorn'

                WHEN (EXTRACT(MONTH FROM p.birth_date) = 1 AND EXTRACT(DAY FROM p.birth_date) >= 20)
                  OR (EXTRACT(MONTH FROM p.birth_date) = 2 AND EXTRACT(DAY FROM p.birth_date) <= 18) THEN 'aquarius'

                WHEN (EXTRACT(MONTH FROM p.birth_date) = 2 AND EXTRACT(DAY FROM p.birth_date) >= 19)
                  OR (EXTRACT(MONTH FROM p.birth_date) = 3 AND EXTRACT(DAY FROM p.birth_date) <= 20) THEN 'pisces'

                ELSE NULL
              END AS zodiac
            FROM profiles p
            SQL
            );

            return;
        }

        //
        // If you ever have other drivers, you can handle them here…
        //
    }

    public function down(): void
    {
        // Drop the view regardless of driver
        DB::statement('DROP VIEW IF EXISTS profile_dynamic_extras');
    }
};
