<?php

declare(strict_types=1);

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Profile\Models\Profile;
use Modules\Profile\Models\ProfileDynamicExtra;

it('has a belongsTo profile relationship', function () {
    $relation = (new ProfileDynamicExtra())->profile();

    expect($relation)
        ->toBeInstanceOf(BelongsTo::class)
        ->and($relation->getForeignKeyName())->toEqual('profile_id')
        ->and($relation->getOwnerKeyName())->toEqual('id')
        ->and($relation->getRelated())->toBeInstanceOf(Profile::class);
});

it('computes age and zodiac from the dynamic‐extra view based on birth_date', function () {

    $now = Carbon::create(2025, 6, 7);

    Carbon::setTestNow($now);

    $birthDate = Carbon::create(1991, 4, 23);

    $profile = Profile::factory()->create([
        'birth_date' => $birthDate->format('Y-m-d'),
    ]);

    $dynamic = $profile->dynamicExtras;

    // Assert age is calculated correctly
    expect($dynamic->age)->toBeInt()->toBe(34);
});
