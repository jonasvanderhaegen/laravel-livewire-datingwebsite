<?php

declare(strict_types=1);

use App\Models\User;
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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->ulid('ulid')->unique()->index();

            $table->tinyInteger('public')->default(false);

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();

            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->tinyInteger('js_location')->default(0);

            $table->tinyInteger('orientations_notsay')->default(0);
            $table->tinyInteger('pets_notsay')->default(0);

            $table->tinyInteger('children_notsay')->default(0);
            $table->tinyInteger('children')->nullable();

            $table->tinyInteger('diet_notsay')->default(0);
            $table->tinyInteger('diet')->nullable();

            $table->tinyInteger('drink_notsay')->default(0);
            $table->tinyInteger('drink')->nullable();

            $table->tinyInteger('drugs_notsay')->default(0);
            $table->tinyInteger('drugs')->nullable();

            $table->tinyInteger('smoke_notsay')->default(0);
            $table->tinyInteger('smoke')->nullable();

            $table->tinyInteger('zodiac_notsay')->default(0);

            $table->tinyInteger('religion_notsay')->default(0);
            $table->tinyInteger('religion')->nullable();

            $table->tinyInteger('employment_notsay')->default(0);
            $table->tinyInteger('employment')->nullable();

            $table->tinyInteger('education_notsay')->default(0);
            $table->tinyInteger('education')->nullable();

            $table->tinyInteger('language_notsay')->default(0);
            $table->tinyInteger('politics_notsay')->default(0);
            $table->tinyInteger('politics')->nullable();

            $table->tinyInteger('ethnicity_notsay')->default(0);
            $table->tinyInteger('bodytype_notsay')->default(0);
            $table->tinyInteger('bodytype')->nullable();

            $table->tinyInteger('height_notsay')->default(0);
            $table->smallInteger('height')->nullable();

            $table->tinyInteger('pronouns_notsay')->default(0);
            $table->string('pronouns')->nullable();
            $table->string('custom_pronouns')->nullable();

            $table->tinyInteger('relationship_type')->nullable();

            $table->date('birth_date')->nullable();

            $table->string('country_id')->nullable();

            $table->decimal('lat', 10, 7)
                ->nullable()
                ->comment('Latitude for distance calculations');

            $table->decimal('lng', 10, 7)
                ->nullable()
                ->comment('Longitude for distance calculations');

            // Composite index to speed up bounding-box queries
            $table->index(['lat', 'lng'], 'profiles_lat_lng_index');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
