<?php

declare(strict_types=1);

namespace Modules\Profile\Models\Pivots;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Modules\Profile\Concerns\ClearsProfileUlidCache;

final class OrientationProfile extends Pivot
{
    use ClearsProfileUlidCache;
}
