<?php

declare(strict_types=1);

namespace Modules\Profile\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

final class ProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
    }

    public function before(User $user, $ability): ?bool
    {
        if (!$user->hasCompletedOnboarding()) {
            return false;
        }

        return true;
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
