<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Profile\Models\Preference;
use Modules\Profile\Models\Profile;

uses(RefreshDatabase::class);

it('does not use timestamps', function () {
    $preference = new Preference;
    expect($preference->timestamps)->toBeFalse();
});

it('belongs to a profile', function () {
    // create a profile via factory
    $profile = Profile::factory()->create();

    // manually associate
    $preference = new Preference;
    $preference->profile()->associate($profile);
    $preference->save();

    // reload and assert
    $loaded = Preference::firstOrFail();
    expect($loaded->profile)
        ->toBeInstanceOf(Profile::class)
        ->and($loaded->profile->id)
        ->toEqual($profile->id);
});
