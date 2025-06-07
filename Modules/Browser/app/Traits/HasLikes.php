<?php

declare(strict_types=1);

namespace Modules\Browser\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Modules\Profile\Models\Profile;

trait HasLikes
{
    /**
     * the profiles this one has “liked”
     *
     * @return BelongsToMany<Profile, $this, Pivot, 'pivot'>
     */
    public function likedProfiles(): BelongsToMany
    {
        return $this->belongsToMany(
            Profile::class,
            'likes',
            'profile_id',        // this profile’s FK on the pivot
            'liked_profile_id'   // the other profile’s FK on the pivot
        );
    }

    /**
     * the profiles who have “liked” this one
     *
     * @return BelongsToMany<Profile, $this, Pivot, 'pivot'>
     */
    public function likedByProfiles(): BelongsToMany
    {
        return $this->belongsToMany(
            Profile::class,
            'likes',
            'liked_profile_id',  // this profile’s FK on the pivot
            'profile_id'         // the other profile’s FK on the pivot
        );
    }

    /**
     * likewise for passes
     *
     * @return BelongsToMany<Profile, $this, Pivot, 'pivot'>
     */
    public function passedProfiles(): BelongsToMany
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

    /**
     * The likes relation itself (self-referential pivot).
     *
     * @return BelongsToMany<Profile, $this, Pivot, 'pivot'>
     */
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

    /**
     * The passes relation itself (self-referential pivot).
     *
     * @return BelongsToMany<Profile, $this, Pivot, 'pivot'>
     */
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
