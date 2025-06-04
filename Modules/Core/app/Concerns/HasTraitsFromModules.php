<?php

declare(strict_types=1);

namespace Modules\Core\Concerns;

use Modules\OnboardUser\Traits\HasOnboarding;
use Modules\Profile\Concerns\HasProfile;

trait HasTraitsFromModules
{
    use HasOnboarding, HasProfile, ManipulateUser;
}
