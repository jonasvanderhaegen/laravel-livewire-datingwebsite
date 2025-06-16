<?php

declare(strict_types=1);

namespace Modules\Shard\Providers;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Hashing\Hasher;
use Modules\Shard\Actions\ResolveUserShard;
use Modules\Shard\Services\ShardResolver;
use SensitiveParameter;

final class ShardUserProvider implements UserProvider
{
    public function __construct(protected Hasher $hasher, protected string $model, protected ResolveUserShard $resolveUserShard) {}

    public function retrieveById($identifier): ?Authenticatable
    {
        $shard = session('user_shard')
            ?? $this->resolveUserShard->byUlid($identifier);
        if (! $shard) {
            return null;
        }

        ShardResolver::setShard($shard);

        // cache the *attributes* for 30 seconds
        $cacheKey = "shard:{$shard}:user:{$identifier}";
        $data = cache()->remember($cacheKey, 30, function () use ($identifier, $shard) {
            // ❌ this loses hidden attrs (like remember_token)
            // return $this->model::on($shard)
            //     ->find($identifier)
            //     ?->toArray();

            // ✅ fetch the model, then grab its full attributes
            $model = $this->model::on($shard)->find($identifier);

            return $model
                ? $model->getAttributes()   // includes remember_token, etc.
                : null;
        });

        if (! $data) {
            return null;
        }

        // hydrate a fresh User instance with the cached data
        $user = new $this->model($data);
        $user->setConnection($shard);
        $user->exists = true;

        return $user;
    }

    public function validateCredentials(Authenticatable $user, array $credentials): bool
    {
        return $this->hasher->check($credentials['password'], $user->getAuthPassword());
    }

    public function retrieveByToken($identifier, #[SensitiveParameter] $token)
    {
        // 1) find the shard (session or Redis)
        $shard = session('user_shard') ?: $this->resolveUserShard->byId($identifier);
        if (! $shard) {
            return null;
        }
        ShardResolver::setShard($shard);

        // 2) load the user by ID and remember_token
        return $this->model::on($shard)
            ->where('id', $identifier)
            ->where('remember_token', $token)
            ->first();
    }

    public function updateRememberToken(Authenticatable $user, #[SensitiveParameter] $token)
    {
        // set the new token on the model
        $user->setRememberToken($token);
        // and persist it to _that same shard_:
        $user->getConnectionName(); // ensures your Shardable trait picks up the shard
        $user->saveQuietly();
    }

    public function retrieveByCredentials(#[SensitiveParameter] array $credentials)
    {
        // 1) We only care about an "email" key here
        if (empty($credentials['email'])) {
            return null;
        }

        // 2) Figure out which shard this email lives on
        $map = $this->resolveUserShard->byEmail($credentials['email']);
        if (! $map) {
            return null;
        }

        // 3) Tell the resolver (so Shardable and on() both agree)
        ShardResolver::setShard($map['shard_id']);

        // 4) Finally load the user by email from that shard
        return $this->model::on($map['shard_id'])
            ->where('email', $credentials['email'])
            ->first();
        // TODO: Implement retrieveByCredentials() method.
    }

    public function rehashPasswordIfRequired(
        Authenticatable $user,
        #[SensitiveParameter] array $credentials,
        bool $force = false
    ) {
        // TODO: Implement rehashPasswordIfRequired() method.
    }
}
