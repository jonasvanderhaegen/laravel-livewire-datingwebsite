<?php

declare(strict_types=1);

namespace Modules\Browser\Livewire\Pages;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\WithPagination;
use Modules\CustomTheme\Livewire\Layouts\General;
use Modules\Profile\Models\Profile;

// @codeCoverageIgnoreStart
final class Likes extends General
{
    use WithPagination;

    public function render(): View
    {
        $me = auth()->user()->profile;

        /**
         * @var LengthAwarePaginator<int,Profile> $likes
         */
        // @phpstan-ignore-next-line – PHPStan can’t infer paginate()’s generic
        $likes = $me
            ->likedProfiles()
            ->paginate(3, ['*'], 'likes-page');

        /**
         * @var LengthAwarePaginator<int,Profile> $likesYou
         */
        // @phpstan-ignore-next-line
        $likesYou = $me
            ->likedByProfiles()
            ->paginate(3, ['*'], 'likes-you-page');

        /**
         * @var LengthAwarePaginator<int,Profile> $passes
         */
        // @phpstan-ignore-next-line
        $passes = $me
            ->passedProfiles()
            ->paginate(3, ['*'], 'passes-page');

        return view('browser::livewire.pages.likes', compact(
            'likes',
            'likesYou',
            'passes',
        ));
    }
}
// @codeCoverageIgnoreEnd
