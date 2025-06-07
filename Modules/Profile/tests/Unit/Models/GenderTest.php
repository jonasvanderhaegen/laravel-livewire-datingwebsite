<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Profile\Models\Gender;
use Modules\Profile\Models\Profile;

it('has timestamps disabled', function () {
    $gender = new Gender;
    expect($gender->timestamps)->toBeFalse();
});

it('has no fillable attributes', function () {
    $gender = new Gender;
    expect($gender->getFillable())->toBeEmpty();
});

it('defines a many-to-many profile relationship', function () {
    $gender = new Gender;
    $relation = $gender->profile();

    expect($relation)->toBeInstanceOf(BelongsToMany::class)
        ->and($relation->getRelated())->toBeInstanceOf(Profile::class)
        ->and($relation->getTable())->toBe('gender_profile')
        ->and($relation->getForeignPivotKeyName())->toBe('gender_id')
        ->and($relation->getRelatedPivotKeyName())->toBe('profile_id');
});
