<?php

declare(strict_types=1);

namespace Modules\Core\Concerns;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Modules\OnboardUser\Traits\HasOnboarding;
use Modules\Profile\Concerns\HasProfile;
use Modules\Shard\Concerns\Shardable;

/**
 * @mixin HasOnboarding
 * @mixin HasProfile
 */
trait HasTraitsFromModules
{
    use HasOnboarding, HasProfile, HasUlids, ManipulateUser, Shardable;
}
