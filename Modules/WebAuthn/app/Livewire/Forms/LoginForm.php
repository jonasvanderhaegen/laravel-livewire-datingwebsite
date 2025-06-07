<?php

declare(strict_types=1);

namespace Modules\WebAuthn\Livewire\Forms;

use Livewire\Form;
use Modules\Core\Concerns\RateLimitDurations;
use Modules\Core\Concerns\WithRateLimiting;
use Modules\Core\Exceptions\TooManyRequestsException;

// @codeCoverageIgnoreStart
final class LoginForm extends Form
{
    use RateLimitDurations, WithRateLimiting;

    public bool $remember = true;

    /**
     * @throws TooManyRequestsException
     */
    public function rateLimitForm(): void
    {
        $this->rateLimit(5, $this->shortDuration('auth.passwords.passkeys.throttle'));
    }
}
// @codeCoverageIgnoreEnd
