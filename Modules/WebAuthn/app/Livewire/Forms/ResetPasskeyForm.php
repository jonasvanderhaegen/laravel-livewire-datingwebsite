<?php

declare(strict_types=1);

namespace Modules\WebAuthn\Livewire\Forms;

use Livewire\Attributes\Locked;
use Livewire\Form;
use Modules\Core\Concerns\RateLimitDurations;
use Modules\Core\Concerns\WithRateLimiting;
use Modules\Core\Exceptions\TooManyRequestsException;
use Modules\Core\Rules\StrictEmailDomain;

// @codeCoverageIgnoreStart
final class ResetPasskeyForm extends Form
{
    use RateLimitDurations, WithRateLimiting;

    #[Locked]
    public string $token = '';

    public string $email = '';

    /**
     * @return array<string, array<int, StrictEmailDomain|string>>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'lowercase', 'max:255', new StrictEmailDomain],
        ];
    }

    /**
     * @throws TooManyRequestsException
     */
    public function rateLimitForm(): void
    {
        $this->validate();
        // 1) Quick IP‐burst guard: max 5 tries / minute
        $this->rateLimit(5, $this->shortDuration());

        // 2) Account‐scoped guard: max 3 resets / hour per email
        $this->rateLimitByEmail(3, $this->longDuration(), $this->email, 'resetPasskey');
    }
}
// @codeCoverageIgnoreEnd
