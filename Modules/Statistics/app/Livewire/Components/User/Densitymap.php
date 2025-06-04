<?php

declare(strict_types=1);

namespace Modules\Statistics\Livewire\Components\User;

use Livewire\Component;
use Modules\Statistics\Models\UserDensity;

final class Densitymap extends Component
{
    public function getMapCellsProperty()
    {
        $cells = UserDensity::all();

        return $cells->map(function ($c) {
            return [
                'lat' => (float) $c->lat_bucket,
                'lng' => (float) $c->lng_bucket,
                'count' => (int) $c->user_count,
            ];
        })->all();
    }

    public function render()
    {

        return view('statistics::livewire.components.user.densitymap');
    }
}
