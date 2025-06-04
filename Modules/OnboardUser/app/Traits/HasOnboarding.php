<?php

declare(strict_types=1);

namespace Modules\OnboardUser\Traits;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Model;
use Spatie\Onboard\Concerns\GetsOnboarded;

trait HasOnboarding
{
    use GetsOnboarded;

    /**
     * Eloquent will automatically call
     * initialize{TraitName}()
     * when the model is instantiated.
     */
    public function initializeHasOnboarding(): void
    {
        $this->mergeCasts([
            // automatically cast JSON <-> array
            'onboarding_steps' => AsArrayObject::class,
            // automatically cast boolean
            'onboarding_complete' => 'boolean',
        ]);

        static::creating(function (Model $model) {
            if (is_null($model->onboarding_steps)) {
                $model->onboarding_steps = array_fill_keys(
                    array_keys(config('onboarduser.steps')),
                    false
                );
            }
        });
    }

    /**
     * Mark a single onboarding step as completed.
     */
    public function markOnboardingStep(string $step): void
    {
        $steps = $this->onboarding_steps ?? [];
        $steps[$step] = true;
        $this->setAttribute('onboarding_steps', $steps);
        $this->saveQuietly();
    }

    /**
     * Check if the given step was completed.
     */
    public function hasOnboardingStep(string $step): bool
    {
        // onboarding_steps is now ALWAYS an array or null
        $steps = $this->onboarding_steps ?? [];

        // coerce anything truthy/”1” to boolean
        return ! empty($steps[$step]);

        // return data_get($this->onboarding_steps, $step, false) === true;
    }

    /**
     * Returns true if the user has finished onboarding.
     */
    public function hasCompletedOnboarding(): bool
    {
        return $this->onboarding_complete === true;
    }

    /**
     * Given an array of required steps, mark the
     * overall onboarding_complete flag if all are done.
     */
    public function finalizeOnboarding(array $requiredSteps): void
    {
        $allDone = collect($this->onboarding_steps)
            ->only($requiredSteps)
            ->every(fn ($v) => $v === true);

        if ($allDone && ! $this->onboarding_complete) {
            $this->setAttribute('onboarding_complete', true);
            $this->saveQuietly();
        }
    }
}
