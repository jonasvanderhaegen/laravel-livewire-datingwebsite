<?php

declare(strict_types=1);

namespace Modules\Browser\Livewire\Pages;

use DB;
use Illuminate\View\View;
use Livewire\WithPagination;
use MeiliSearch\Endpoints\Indexes;
use Modules\CustomTheme\Livewire\Layouts\General;
use Modules\Profile\Models\Profile;

final class Index extends General
{
    use WithPagination;

    public function render(): View
    {
        // 1) auth + profile in one go
        $profile = auth()->user()->profile;

        // 2) cached excludes, etc…
        $excluded = cache()->remember(
            "profile:{$profile->id}:excluded",
            now()->addMinutes(5),
            function () use ($profile) {
                $outgoing = $profile->likes()->pluck('liked_profile_id')
                    ->merge($profile->passes()->pluck('passed_profile_id'));

                $incoming = DB::table('passes')
                    ->where('passed_profile_id', $profile->id)
                    ->pluck('profile_id');

                return $outgoing
                    ->merge($incoming)
                    ->unique()
                    ->values()
                    ->all();
            }
        );

        // 3) Scout search + paginate
        $results = Profile::search('', function (Indexes $ms, string $q, array $opts) use ($profile, $excluded) {
            $filters = [];
            if ($excluded) {
                $filters[] = 'NOT id IN ['.implode(',', $excluded).']';
            }
            $filters[] = 'id != '.$profile->id;
            $filters[] = "_geoRadius({$profile->lat},{$profile->lng},9000000)";
            $opts['filter'] = $filters;
            $opts['sort'] = ["_geoPoint({$profile->lat},{$profile->lng}):asc"];

            return $ms->search($q, $opts);
        })->paginate(10);

        return view('browser::livewire.pages.index', compact('results'))
            ->title(__('Browsing through profiles'));
    }
}
