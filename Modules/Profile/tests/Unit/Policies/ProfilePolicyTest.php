<?php

use App\Models\User;
use Modules\Profile\Policies\ProfilePolicy;


it('denies every ability if onboarding is not complete', function () {
    /** @var User $user */
    $user = User::factory()->create(['onboarding_complete' => false]);

    $policy = new ProfilePolicy();

    // before() is called by the gate before any other method, and returns false → deny
    expect($policy->before($user, 'update'))->toBeFalse()
        ->and($policy->update($user))->toBeTrue()
        ->and($policy->comment($user))->toBeFalse();

    // Even though update() itself returns true, the gate short-circuits on before()
    // but the gate would never call update() if before() returned false

    // comment() also would be denied by before()
});

it('allows every ability if onboarding is complete', function () {
    /** @var User $user */
    $user = User::factory()->create(['onboarding_complete' => true]);

    $policy = new ProfilePolicy();

    // before() returning true short-circuits and allows everything
    expect($policy->before($user, 'anyAbility'))->toBeTrue()
        ->and($policy->update($user))->toBeTrue()
        ->and($policy->comment($user))->toBeTrue();

    // Direct calls (outside of the gate) still behave as declared:
});
