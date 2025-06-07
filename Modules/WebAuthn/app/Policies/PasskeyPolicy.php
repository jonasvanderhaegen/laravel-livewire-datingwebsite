<?php

declare(strict_types=1);

namespace Modules\WebAuthn\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Spatie\LaravelPasskeys\Models\Passkey;

final class PasskeyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can delete the given passkey.
     */
    public function delete(User $user, Passkey $passkey): bool
    {
        if ($passkey->authenticatable_id !== $user->id) {
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
