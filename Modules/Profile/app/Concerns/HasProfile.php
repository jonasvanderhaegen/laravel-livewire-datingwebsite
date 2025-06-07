<?php

declare(strict_types=1);

namespace Modules\Profile\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Profile\Models\Interest;
use Modules\Profile\Models\Photo;
use Modules\Profile\Models\Profile;

/*
* @method HasOne<Profile, User> profile()
*/

trait HasProfile
{
    public function initializeHasProfile(): void
    {
        static::created(function (Model $model) {
            if (! $model->profile()->exists()) {
                $model->profile()->create([
                    'ulid' => $model->ulid,
                ]);
            }
        });
    }

    /**
     * @return HasOne<Profile, $this>
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * @return HasManyThrough<Photo, Profile, $this>
     */
    public function photos(): HasManyThrough
    {
        return $this->hasManyThrough(Photo::class, Profile::class);
    }

    /**
     * @return HasManyThrough<Interest, Profile, $this>
     */
    public function interests(): HasManyThrough
    {
        return $this->hasManyThrough(Interest::class, Profile::class);
    }
}
