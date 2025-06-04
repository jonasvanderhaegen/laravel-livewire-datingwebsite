<?php

declare(strict_types=1);

namespace Modules\WebAuthn\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\WebAuthn\Models\Passkey;

final class PasskeyPolicy
{
    use HandlesAuthorization;

    /**
     * Allow admins to do anything.
     */
    public function before(User $user, $ability) {}

    /**
     * Determine whether the user can delete the given passkey.
     */
    public function delete(User $user, Passkey $passkey): bool
    {
        // only the owner may delete…
        if ($passkey->user_id !== $user->id) {
            return false;
        }

        // …and only if they have more than one passkey registered

        return $user->passkeys_count > 1;
    }

    /**
     * Only allow creating a new passkey if the user has
     * fewer than 6 already.
     */
    public function create(User $user): bool
    {
        return $user->passkeys_count < 6;
    }
}
