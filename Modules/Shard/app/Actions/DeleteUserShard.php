<?php

declare(strict_types=1);

namespace Modules\Shard\Actions;

use Illuminate\Support\Facades\Redis;

final class DeleteUserShard
{
    public function __invoke(string $email, string $ulid): void
    {
        Redis::hdel('user_shard:emails', $email);
        Redis::hdel('user_shard:ulids', $ulid);
    }
}
