<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->tinyInteger('match')->default(false);
            $table->integer('amount')->default(0);
            $table->string('time')->default('h');
            $table->mediumText('short');
            $table->longText('long')->nullable();
            $table->timestamps();
            $table->tinyInteger('show')->default(0);
            $table->tinyInteger('review')->default(0);

        });

        Schema::create('pending_testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->tinyInteger('match')->default(false);
            $table->integer('amount')->default(0);
            $table->string('time')->default('h');
            $table->mediumText('short');
            $table->longText('long')->nullable();

            $table->tinyInteger('reviewed')->default(0);
            $table->tinyInteger('review')->default(0);
            $table->tinyInteger('show')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('testimonials');
    }
};
