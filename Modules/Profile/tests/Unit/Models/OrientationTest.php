<?php

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Profile\Models\Orientation;
use Modules\Profile\Models\Profile;

it('has timestamps disabled', function () {
    $orientation = new Orientation;
    expect($orientation->timestamps)->toBeFalse();
});

it('has no fillable attributes', function () {
    $orientation = new Orientation;
    expect($orientation->getFillable())->toBeEmpty();
});

it('defines a many-to-many profile relation', function () {
    $orientation = new Orientation;
    $relation = $orientation->profile();

    expect($relation)->toBeInstanceOf(BelongsToMany::class)
        ->and($relation->getRelated())->toBeInstanceOf(Profile::class)
        ->and($relation->getTable())->toBe('orientation_profile')
        ->and($relation->getForeignPivotKeyName())->toBe('orientation_id')
        ->and($relation->getRelatedPivotKeyName())->toBe('profile_id');

    // Default pivot table name should be "orientation_profile"

    // The foreign/pivot keys should default to orientation_id and profile_id
});
