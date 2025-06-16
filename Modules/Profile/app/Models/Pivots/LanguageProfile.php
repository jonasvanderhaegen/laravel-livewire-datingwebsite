<?php

declare(strict_types=1);

namespace Modules\Profile\Models\Pivots;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Modules\Profile\Concerns\ClearsProfileUlidCache;
use Modules\Shard\Services\ShardResolver;

final class LanguageProfile extends Pivot
{
    use ClearsProfileUlidCache;

    public function getConnectionName(): string
    {
        return ShardResolver::getCurrentShard();
    }
}
