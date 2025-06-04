<?php

declare(strict_types=1);

namespace Modules\Profile\Concerns;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Modules\Profile\Models\Profile;

trait ClearsProfileUlidCache
{
    public static function bootClearsProfileUlidCache(): void
    {
        static::created(fn (Pivot $pivot) => $pivot->clearProfile());
        static::deleted(fn (Pivot $pivot) => $pivot->clearProfile());
    }

    protected function clearProfile(): void
    {
        if ($this->profile_id) {
            cache()->forget("profile.route.ulid.{$this->getProfileUlid()}");
        }
    }

    protected function getProfileUlid(): string
    {
        // Assumes Profile model has ulid
        return $this->belongsTo(
            Profile::class,
            'profile_id'
        )->first()->ulid;
    }
}
