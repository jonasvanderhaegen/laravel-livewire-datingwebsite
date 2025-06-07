<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Profile\Models\Ethnicity;
use Modules\Profile\Models\Profile;

it('has timestamps disabled', function () {
    $ethnicity = new Ethnicity;
    expect($ethnicity->timestamps)->toBeFalse();
});

it('has no fillable attributes', function () {
    $ethnicity = new Ethnicity;
    expect($ethnicity->getFillable())->toBeEmpty();
});

it('defines a many-to-many profile relationship', function () {
    $ethnicity = new Ethnicity;
    $relation = $ethnicity->profile();

    expect($relation)->toBeInstanceOf(BelongsToMany::class)
        ->and($relation->getRelated())->toBeInstanceOf(Profile::class)
        ->and($relation->getTable())->toBe('ethnicity_profile')
        ->and($relation->getForeignPivotKeyName())->toBe('ethnicity_id')
        ->and($relation->getRelatedPivotKeyName())->toBe('profile_id');

});
