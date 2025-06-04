<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Profile\Models\Orientation;
use Modules\Profile\Models\Profile;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orientations', function (Blueprint $table) {
            $table->id();
            $table->string('identifier');
            // $table->string('description')->nullable();
        });

        Schema::create('orientation_profile', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Profile::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Orientation::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orientations');
        Schema::dropIfExists('orientation_profile');

    }
};
