<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Profile\Models\Pet;
use Modules\Profile\Models\Profile;

uses(RefreshDatabase::class);

it('has timestamps disabled', function () {
    $pet = new Pet;
    expect($pet->timestamps)->toBeFalse();
});

it('has no fillable attributes', function () {
    $pet = new Pet;
    expect($pet->getFillable())->toBeEmpty();
});

it('defines a many-to-many profile relation', function () {
    $pet = new Pet;
    $relation = $pet->profile();

    expect($relation)->toBeInstanceOf(BelongsToMany::class)
        ->and($relation->getRelated())->toBeInstanceOf(Profile::class)
        ->and($relation->getTable())->toBe('pet_profile')
        ->and($relation->getForeignPivotKeyName())->toBe('pet_id')
        ->and($relation->getRelatedPivotKeyName())->toBe('profile_id');
});
