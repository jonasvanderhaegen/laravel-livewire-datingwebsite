<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Profile\Models\Interest;
use Modules\Profile\Models\Profile; // <- use your Profile *model*, not the Livewire Page

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('interest_profile', function (Blueprint $table) {
            // No need for a surrogate id on a pure pivot
            // interest_id with an index, but no FK
            $table->unsignedBigInteger((new Interest)->getForeignKey());
            $table->index((new Interest)->getForeignKey());

            $table->foreignIdFor(Profile::class)
                ->constrained()
                ->cascadeOnDelete();

            // Composite primary key to prevent duplicates
            $table->primary([
                (new Interest)->getForeignKey(),
                (new Profile)->getForeignKey(),
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('interest_profile');
    }
};
