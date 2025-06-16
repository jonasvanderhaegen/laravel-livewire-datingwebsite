<?php

declare(strict_types=1);

namespace Modules\Shard\Services;

use Illuminate\Support\Str;

final class ShardResolver
{
    private static ?string $currentShard = null;

    public static function setShard(string $shard): void
    {
        self::$currentShard = $shard;
    }

    public static function connectionForEmail(string $email): string
    {
        // grab all your shard connection names
        $shards = array_filter(
            array_keys(config('shard.database.connections')),
            fn ($name) => Str::startsWith($name, 'user_shard_')
        );
        sort($shards);

        // simple modulo on crc32 of the email
        $idx = crc32($email) % count($shards);

        return $shards[$idx];
    }

    public static function connectionForUserId(int $userId): string
    {
        // If auth flow has set a shard explicitly, honor it first
        if (self::$currentShard) {
            return self::$currentShard;
        }

        // Fallback: hash-modulo by user ID
        $shards = array_filter(
            array_keys(config('shard.database.connections')),
            fn ($name) => Str::startsWith($name, 'user_shard_')
        );
        sort($shards);

        $idx = $userId % count($shards);

        return $shards[$idx];
    }

    /**
     * Retrieve the explicitly set shard, or null.
     */
    public static function getCurrentShard(): ?string
    {
        return self::$currentShard;
    }
}
