<?php

declare(strict_types=1);

namespace Modules\Profile\Concerns;

use Modules\Profile\Models\Profile;

trait ClearsProfileUlidCache
{
    // @codeCoverageIgnoreStart
    public static function bootClearsProfileUlidCache(): void
    {
        static::created(fn(self $pivot) => $pivot->clearProfile());
        static::deleted(fn(self $pivot) => $pivot->clearProfile());
    }


    protected function clearProfile(): void
    {
        if ($this->profile_id) {
            cache()->forget("profile.route.ulid.{$this->getProfileUlid()}");
        }
    }

    protected function getProfileUlid(): string
    {
        return $this->belongsTo(Profile::class, 'profile_id')
            ->firstOrFail()
            ->ulid;
    }
    // @codeCoverageIgnoreEnd
}
