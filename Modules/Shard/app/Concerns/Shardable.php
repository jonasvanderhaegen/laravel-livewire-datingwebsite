<?php

declare(strict_types=1);

namespace Modules\Shard\Concerns;

use Modules\Shard\Services\ShardResolver;

trait Shardable
{
    public function getConnectionName(): string
    {
        // 1) If we’ve explicitly set a shard this request, use it.
        if ($shard = ShardResolver::getCurrentShard()) {
            return $shard;
        }

        // 2) If the model already has a connection (via ->on($shard) or setConnection()),
        //    use that rather than falling back to default.
        if (! empty($this->connection)) {
            return $this->connection;
        }

        // 3) Otherwise, derive from the owning user’s ID
        $key = $this->user_id ?? $this->id;

        // 4) If we still don’t have a key (new model before create), use the app default.
        if (empty($key)) {
            return config('database.default');
        }

        // 5) Finally, hash-modulo on the key.
        return ShardResolver::connectionForUserId((int) $key);
    }
}
