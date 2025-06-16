<?php

declare(strict_types=1);

namespace Modules\Shard\Actions;

use Illuminate\Support\Facades\Redis;

final class StoreUserShardMapping
{
    public function __invoke(string $email, string $ulid, string $shardId): void
    {
        Redis::hset('user_shard:emails', $email, "{$ulid}|{$shardId}");
        Redis::hset('user_shard:ulids', (string) $ulid, $shardId);
    }
}
