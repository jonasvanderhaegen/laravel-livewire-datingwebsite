<?php

declare(strict_types=1);

namespace Modules\Browser\Livewire\Pages;

use Illuminate\View\View;
use Livewire\WithPagination;
use Modules\CustomTheme\Livewire\Layouts\General;

final class Likes extends General
{
    use WithPagination;

    public function render(): View
    {
        $me = auth()->user()->profile;

        return view('browser::livewire.pages.likes', [
            'likes' => $me->likedProfiles()->paginate(3, pageName: 'likes-page'),
            'likesYou' => $me->likedByProfiles()->paginate(3, pageName: 'likes-you-page'),
            'passes' => $me->passedProfiles()->paginate(3, pageName: 'passes-page'),
        ]);
    }
}
