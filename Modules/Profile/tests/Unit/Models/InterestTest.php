<?php

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Profile\Models\Interest;
use Modules\Profile\Models\Profile;

it('has timestamps disabled', function () {
    $interest = new Interest;
    expect($interest->timestamps)->toBeFalse();
});

it('has no fillable attributes', function () {
    $interest = new Interest;
    expect($interest->getFillable())->toBeEmpty();
});

it('defines a many-to-many profile relationship', function () {
    $interest = new Interest;
    $relation = $interest->profile();

    expect($relation)->toBeInstanceOf(BelongsToMany::class)
        ->and($relation->getRelated())->toBeInstanceOf(Profile::class)
        ->and($relation->getTable())->toBe('interest_profile')
        ->and($relation->getForeignPivotKeyName())->toBe('interest_id')
        ->and($relation->getRelatedPivotKeyName())->toBe('profile_id');
});
