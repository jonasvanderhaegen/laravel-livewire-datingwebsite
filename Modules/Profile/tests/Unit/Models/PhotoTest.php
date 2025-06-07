<?php

declare(strict_types=1);

use Modules\Profile\Models\Photo;
use Modules\Profile\Models\Profile;

it('automatically generates a ULID when creating a photo without one', function () {
    // Create a related profile first
    $profile = Profile::factory()->create();

    // Make a photo instance without an ULID
    $photo = Photo::factory()
        ->create([
            'ulid' => null,
            'profile_id' => $profile->id,
        ]);

    // Save to trigger the creating event

    // It should now have a ULID
    expect($photo->ulid)
        ->toBeString()
        ->not()->toBeEmpty()
        // ULIDs are 26-character Crockford (A-Z0-9) strings
        ->toMatch('/^[0-9A-Z]{26}$/');
});

it('uses timestamps by default', function () {
    $photo = new Photo;
    expect($photo->timestamps)->toBeTrue();
});

it('has no fillable attributes by default', function () {
    $photo = new Photo;
    expect($photo->getFillable())->toBeEmpty();
});

it('belongs to a profile', function () {
    // create a profile
    $photo = Photo::factory()
        ->has($profile = Profile::factory())
        ->create();

    // reload and assert
    expect($photo->profile)
        ->toBeInstanceOf(Profile::class);
});
