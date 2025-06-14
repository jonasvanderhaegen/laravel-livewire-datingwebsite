<?php

declare(strict_types=1);

namespace Modules\WebAuthn\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Modules\Core\Concerns\RateLimitDurations;
use Modules\Core\Concerns\WithRateLimiting;
use Modules\Core\Exceptions\TooManyRequestsException;
use Modules\Core\Rules\StrictDob;
use Modules\Core\Rules\StrictEmailDomain;

// @codeCoverageIgnoreStart
final class RegisterForm extends Form
{
    use RateLimitDurations, WithRateLimiting;

    public ?string $name = null;

    #[Validate('required|string|max:255')]
    public string $firstname = '';

    #[Validate('required|string|max:255')]
    public string $lastname = '';

    public string $email = '';

    public string $dob = '';

    #[Validate('required|accepted')]
    public bool $terms = false;

    /**
     * @throws TooManyRequestsException
     */
    public function validateAndThrottle(): void
    {
        // 2) IP-based quick throttle: max 5 registrations per minute
        $this->rateLimit(4, $this->shortDuration('auth.passwords.passkeys.throttle'));

        // 3) Account-level throttle: max 15 registrations per 15min per email
        $this->rateLimitByEmail(7, $this->longDuration(), $this->email, 'register');

        $this->validate();
    }

    public function getFullName(): string
    {
        return "{$this->firstname} {$this->lastname}";
    }

    /**
     * @return array<string, array<int, StrictDob|StrictEmailDomain|string>>
     */
    public function rules(): array
    {
        return [
            'dob' => ['required', 'string', new StrictDob],

            'email' => [
                'required',
                'email',
                'lowercase',
                'max:255',
                new StrictEmailDomain,
            ],
        ];
    }
}
// @codeCoverageIgnoreEnd
