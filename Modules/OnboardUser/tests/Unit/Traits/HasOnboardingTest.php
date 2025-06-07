<?php

// Modules/OnboardUser/tests/Unit/HasOnboardingTest.php
declare(strict_types=1);

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Model;
use Modules\OnboardUser\Traits\HasOnboarding;

uses()->group('onboarding');

beforeEach(function () {
    config()->set('onboarduser.steps', [
        'step_a' => [], 'step_b' => [], 'step_c' => [],
    ]);
});

it('merges the correct casts on instantiation', function () {
    $model = new class extends Model
    {
        use HasOnboarding;

        protected $guarded = [];

        // match Laravel 9+ signature
        public function saveQuietly(array $options = []): bool
        {
            return true;
        }
    };

    $casts = $model->getCasts();
    expect($casts)
        ->toHaveKey('onboarding_steps')
        ->and($casts['onboarding_steps'])->toBe(AsArrayObject::class)
        ->and($casts)->toHaveKey('onboarding_complete')
        ->and($casts['onboarding_complete'])->toBe('boolean');
});

it('can mark a step and report it as completed', function () {
    $model = new class extends Model
    {
        use HasOnboarding;

        protected $guarded = [];

        public function saveQuietly(array $options = []): bool
        {
            return true;
        }
    };

    expect($model->hasOnboardingStep('step_a'))->toBeFalse();

    $model->markOnboardingStep('step_a');

    expect($model->hasOnboardingStep('step_a'))->toBeTrue()
        ->and($model->hasOnboardingStep('step_b'))->toBeFalse();
});

it('reports hasCompletedOnboarding only when flagged true', function () {
    $model = new class extends Model
    {
        use HasOnboarding;

        protected $guarded = [];
    };

    expect($model->hasCompletedOnboarding())->toBeFalse();

    $model->setAttribute('onboarding_complete', true);
    expect($model->hasCompletedOnboarding())->toBeTrue();
});

it('finalizeOnboarding flips the complete flag only when all required steps are done', function () {
    $model = new class extends Model
    {
        use HasOnboarding;

        protected $guarded = [];

        public function saveQuietly(array $options = []): bool
        {
            return true;
        }
    };

    $model->setAttribute('onboarding_steps', [
        'step_a' => true,
        'step_b' => true,
        'step_c' => false,
    ]);
    $model->setAttribute('onboarding_complete', false);

    // not all steps done yet
    $model->finalizeOnboarding(['step_a', 'step_b', 'step_c']);
    expect($model->onboarding_complete)->toBeFalse();

    // now complete the last one
    $steps = $model->onboarding_steps;
    $steps['step_c'] = true;
    $model->setAttribute('onboarding_steps', $steps);

    $model->finalizeOnboarding(['step_a', 'step_b', 'step_c']);
    expect($model->onboarding_complete)->toBeTrue();
});
