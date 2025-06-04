<?php

declare(strict_types=1);

namespace Modules\Browser\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Profile\Models\Profile;

trait HasLikes
{
    // the profiles this one has “liked”
    public function likedProfiles()
    {
        return $this->belongsToMany(
            Profile::class,
            'likes',
            'profile_id',        // this profile’s FK on the pivot
            'liked_profile_id'   // the other profile’s FK on the pivot
        );
    }

    // the profiles who have “liked” this one
    public function likedByProfiles()
    {
        return $this->belongsToMany(
            Profile::class,
            'likes',
            'liked_profile_id',  // this profile’s FK on the pivot
            'profile_id'         // the other profile’s FK on the pivot
        );
    }

    // likewise for passes
    public function passedProfiles()
    {
        return $this->belongsToMany(
            Profile::class,
            'passes',
            'profile_id',
            'passed_profile_id'
        );
    }

    /**
     * Check if this profile is liked by another
     */
    public function isLikedBy(Profile $profile): bool
    {
        return $this->likes()
            ->whereKey($profile->id)
            ->exists();
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(
            self::class,
            'likes',
            'profile_id',
            'liked_profile_id'
        )->withTimestamps();
    }

    /**
     * Toggle like/pass interaction
     */
    public function switchInteraction(Profile $other, string $type): void
    {
        $action = $type === 'like' ? 'likes' : 'passes';
        $opposite = $type === 'like' ? 'passes' : 'likes';

        // remove previous opposite
        $this->{$opposite}()->detach($other->id);
        // attach new action without duplication
        $this->{$action}()->syncWithoutDetaching([$other->id]);
    }

    public function passes(): BelongsToMany
    {
        return $this->belongsToMany(
            self::class,
            'passes',
            'profile_id',
            'passed_profile_id'
        )->withTimestamps();
    }
}
