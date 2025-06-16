<?php

declare(strict_types=1);

// database/migrations/2025_05_22_171524_create_user_density_aggregated.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_density_aggregated', function (Blueprint $table) {
            $table->decimal('lat_bucket', 8, 1);
            $table->decimal('lng_bucket', 8, 1);
            $table->string('shard_id');
            $table->unsignedInteger('user_count');
            $table->timestamps();

            $table->primary(['lat_bucket', 'lng_bucket', 'shard_id'], 'ud_agg_pk');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_density_aggregated');
    }
};
