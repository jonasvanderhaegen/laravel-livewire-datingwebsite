<?php

declare(strict_types=1);

namespace Modules\Core\Concerns;

trait ManipulateUser
{
    public function initializeManipulateUser(): void
    {
        /*
        $this->mergeFillable(['ulid']);

        static::creating(function ($user) {
            if (empty($user->ulid)) {
                $user->ulid = (string) Str::ulid();
            }
        });
        */
    }
}
