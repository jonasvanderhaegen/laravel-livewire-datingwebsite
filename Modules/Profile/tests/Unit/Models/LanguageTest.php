<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Profile\Models\Language;
use Modules\Profile\Models\Profile;

it('has timestamps disabled', function () {
    $language = new Language;
    expect($language->timestamps)->toBeFalse();
});

it('has no fillable attributes', function () {
    $language = new Language;
    expect($language->getFillable())->toBeEmpty();
});

it('defines a many-to-many profile relation', function () {
    $language = new Language;
    $relation = $language->profile();

    expect($relation)->toBeInstanceOf(BelongsToMany::class)
        ->and($relation->getRelated())->toBeInstanceOf(Profile::class)
        ->and($relation->getTable())->toBe('language_profile')
        ->and($relation->getForeignPivotKeyName())->toBe('language_id')
        ->and($relation->getRelatedPivotKeyName())->toBe('profile_id');

    // The default pivot table for a Language/Profile relation is language_profile

    // The pivot foreign key on the Language side should default to language_id

    // The pivot foreign key on the Profile side should default to profile_id
});
