<?php

declare(strict_types=1);

namespace Modules\Shard\Actions;

use Illuminate\Support\Facades\Redis;

final class ResolveUserShard
{
    /**
     * Resolve mapping by email.
     *
     * @return array ['user_id' => int, 'shard_id' => string] or null if not found
     */
    public function byEmail(string $email): array
    {
        return cache()->remember(
            "shard_map:email:{$email}",
            now()->addMinutes(1),
            function () use ($email) {
                $payload = Redis::hget('user_shard:emails', $email);
                if (! $payload) {
                    return null;
                }
                [$id, $shard] = explode('|', $payload, 2);

                return ['user_id' => $id, 'shard_id' => $shard];
            }
        );
    }

    /**
     * Resolve shard by user ID.
     *
     * @return string shard ID or null if not found
     */
    public function byUlid(string $ulid): string
    {
        return cache()->remember(
            "shard_map:ulid:{$ulid}",
            now()->addMinutes(1),
            fn () => Redis::hget('user_shard:ulids', (string) $ulid)
        );
    }
}
