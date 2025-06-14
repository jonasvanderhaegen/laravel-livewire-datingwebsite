<?php

declare(strict_types=1);

namespace Modules\Auth\Livewire\Forms;

use Livewire\Form;
use Modules\Core\Concerns\RateLimitDurations;
use Modules\Core\Concerns\WithRateLimiting;

// @codeCoverageIgnoreStart
final class VerifyEmailForm extends Form
{
    use RateLimitDurations, WithRateLimiting;
}
// @codeCoverageIgnoreEnd
