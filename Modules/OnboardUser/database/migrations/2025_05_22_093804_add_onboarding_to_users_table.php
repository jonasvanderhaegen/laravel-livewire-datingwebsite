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
        Schema::table('users', function (Blueprint $table) {
            //
            // will hold your per‐step state, e.g. { "step1": true, "step2": false }
            $table->json('onboarding_steps')
                ->nullable()
                ->after('remember_token');

            // true once the entire flow is done
            $table->boolean('onboarding_complete')
                ->default(false)
                ->after('onboarding_steps');
        });
    }
};
