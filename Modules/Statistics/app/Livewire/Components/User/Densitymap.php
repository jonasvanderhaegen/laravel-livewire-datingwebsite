<?php

declare(strict_types=1);

namespace Modules\Statistics\Livewire\Components\User;

use Illuminate\View\View;
use Livewire\Component;
use Modules\Statistics\Models\UserDensity;

final class Densitymap extends Component
{
    /**
     * @return array<int, array{lat: float, lng: float, count: int}>
     */
    public function getMapCellsProperty(): array
    {
        $cells = UserDensity::all();

        return $cells
            ->map(function (UserDensity $c): array {
                return [
                    'lat' => (float) $c->lat_bucket,
                    'lng' => (float) $c->lng_bucket,
                    'count' => (int) $c->user_count,
                ];
            })
            ->all();
    }

    public function render(): View
    {
        return view('statistics::livewire.components.user.densitymap');
    }
}
