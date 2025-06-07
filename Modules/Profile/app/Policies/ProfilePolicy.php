<?php

declare(strict_types=1);

namespace Modules\Profile\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

final class ProfilePolicy
{
    use HandlesAuthorization;

    public function __construct() {}

    /**
     * Global pre-check: block any abilities until onboarding is complete.
     */
    public function before(User $user, string $ability): bool
    {
        // If onboarding isn’t finished, deny everything
        return $user->hasCompletedOnboarding();
    }

    public function update(User $user): bool
    {
        return true;
    }

    public function comment(User $user): bool
    {
        return $user->hasCompletedOnboarding();
    }
}
