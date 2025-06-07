<?php

declare(strict_types=1);

namespace Modules\Browser\Livewire\Pages;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Modules\CustomTheme\Livewire\Layouts\General;
use Modules\Profile\Models\Profile;

final class Show extends General
{
    /**
     * Displayed profile
     */
    public Profile $profile;

    public function mount(Profile $profile): void
    {
        $this->profile = $profile;

        // Redirect if already liked or passed
        if ($this->isExcluded($profile->id)) {
            $this->redirectRoute('browser.index');
        }
    }

    public function passOn(): void
    {
        $me = auth()->user()->profile;

        // Switch interaction: detach like, attach pass
        $me->switchInteraction($this->profile, 'pass');

        // Clear cached exclusions
        cache()->forget($this->excludedCacheKey());

        $this->redirectRoute('browser.index');
    }

    public function like(): void
    {
        $me = auth()->user()->profile;

        // Switch interaction: detach pass, attach like
        $me->switchInteraction($this->profile, 'like');

        // Clear cached exclusions
        cache()->forget($this->excludedCacheKey());

        $this->redirectRoute('browser.index');
    }

    public function render(): View
    {
        // Determine if current user has liked this profile
        $likedByYou = $this->profile->isLikedBy(auth()->user()->profile);

        return view('browser::livewire.pages.show', compact('likedByYou'));
    }

    public function summaryOfArray(string $key): string
    {
        $prefer_not_say = '_notsay';
        if (isset($this->profile["$key$prefer_not_say"])) {
            if ($this->profile["$key$prefer_not_say"]) {
                return __('Prefer not to say');
            }
        }

        /** @var array<int, array{identifier:string,name:string}> $configList */
        $configList = config("profile.{$key}", []);
        $genderConfig = collect($configList)->pluck('name', 'identifier');

        // 2) Load related items (could be array or Collection)
        /** @var array<int, object{identifier:string}>|Collection<int, object{identifier:string}> $relItems */
        $relItems = $this->profile[$key] ?? [];

        // 2) Extract your identifiers and translate each one
        $labels = collect($relItems)
            ->pluck('identifier')                  // ['gen2','gen1', …]
            ->map(fn(string $id) => $genderConfig->get($id))
            ->filter()                             // drop any missing keys
            ->map(fn(string $translationKey) => __($translationKey))
            ->toArray();

        // 3) Implode into a single string
        return implode(', ', $labels);
    }

    /**
     * @param  string  $group
     * @return string
     */
    public function lookupKey(string $group): string
    {
        $prefer_not_say = '_notsay';
        if (isset($this->profile["$group$prefer_not_say"])) {
            if ($this->profile["$group$prefer_not_say"]) {
                return __('Prefer not to say');
            }
        }
        $code = $this->profile->{$group};
        $index = $code - 1;
        $keys = config("profile.{$group}", []);

        if (!isset($keys[$index])) {
            return '';
        }

        return __($keys[$index]['name']);
    }

    /**
     * Check if a profile ID is excluded (liked or passed by you, or passed on you)
     */
    protected function isExcluded(int $profileId): bool
    {
        return in_array($profileId, $this->getExcludedIds(), true);
    }

    /**
     * Build or retrieve cached excluded IDs list
     * @return int[]  List of profile IDs to exclude
     * */
    protected function getExcludedIds(): array
    {
        $me = auth()->user()->profile;

        return cache()->remember(
            $this->excludedCacheKey(),
            now()->addMinutes(5),
            function () use ($me) {
                $out = $me->passes()->pluck('passed_profile_id');

                $in = DB::table('passes')
                    ->where('passed_profile_id', $me->id)
                    ->pluck('profile_id');

                return $out->merge($in)
                    ->unique()
                    ->values()
                    ->all();
            }
        );
    }

    /**
     * Cache key for excluded IDs
     */
    protected function excludedCacheKey(): string
    {
        return 'profile:'.auth()->id().':excluded';
    }
}
