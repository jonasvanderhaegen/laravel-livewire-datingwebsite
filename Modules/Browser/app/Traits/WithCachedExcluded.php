<?php

declare(strict_types=1);

namespace Modules\Browser\Traits;

use DB;

trait WithCachedExcluded
{
    protected function isExcluded(int $profileId): bool
    {
        return in_array($profileId, $this->getExcludedIds(), true);
    }

    protected function getExcludedIds(): array
    {
        return cache()->remember(
            $this->excludedCacheKey(),
            now()->addMinutes(5),
            function () {
                $out = $this->me->likes()->pluck('liked_profile_id')
                    ->merge($this->me->passes()->pluck('passed_profile_id'));

                $in = DB::table('passes')
                    ->where('passed_profile_id', $this->me->id)
                    ->pluck('profile_id');

                return $out->merge($in)->unique()->values()->all();
            }
        );
    }

    protected function excludedCacheKey(): string
    {
        return "profile:{$this->me->id}:excluded";
    }

    protected function clearExcludedCache(): void
    {
        cache()->forget($this->excludedCacheKey());
    }
}
