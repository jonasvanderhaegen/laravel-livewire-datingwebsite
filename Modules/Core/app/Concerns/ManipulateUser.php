<?php

declare(strict_types=1);

namespace Modules\Core\Concerns;

trait ManipulateUser
{
    public function initializeManipulateUser(): void
    {
        $this->mergeFillable(
            [
                'id',
                // Spatie OnboardUser
                'onboarding_steps',
                'onboarding_complete',
                'remember_token',
                // Timestamps (if you really need to mass-assign them)
                'email_verified_at',
                'created_at',
                'updated_at',
            ]
        );
    }
}
