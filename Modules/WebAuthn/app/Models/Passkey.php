<?php

declare(strict_types=1);

namespace Modules\WebAuthn\Models;

use Spatie\LaravelPasskeys\Models\Passkey as BasePasskey;

final class Passkey extends BasePasskey
{
    /**
     * Force every Passkey to use the default (un-sharded) DB.
     */
    public function getConnectionName(): ?string
    {
        // replace 'mysql' below with whatever `config('database.default')` returns
        return config('database.default');
    }
}
