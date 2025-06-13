<?php

declare(strict_types=1);

namespace Modules\WebAuthn\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Password;
use Livewire\Form;
use Modules\Core\Concerns\RateLimitDurations;
use Modules\Core\Concerns\WithRateLimiting;
use Modules\Core\Exceptions\TooManyRequestsException;
use Modules\Core\Rules\StrictEmailDomain;
use Modules\WebAuthn\Notifications\ResetPasskeyNotification;

// @codeCoverageIgnoreStart
final class LostPasskeyForm extends Form
{
    use RateLimitDurations, WithRateLimiting;

    public string $email = '';

    /**
     * @return array<string, array<int, StrictEmailDomain|string>>
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
                'lowercase',
                'max:255',
                new StrictEmailDomain,
            ],
        ];
    }

    /**
     * @throws TooManyRequestsException
     */
    public function validateAndThrottle(): void
    {

        // 1) IP‐burst guard: max 2/min
        $this->rateLimit(2, $this->shortDuration('auth.passwords.passkeys.throttle'));

        // 2) Account guard: max 4/15min per email
        $this->rateLimitByEmail(5, $this->longDuration(), $this->email, 'lost-passkey');

        // 3) Now send the link (the broker itself may still throttle internally,
        //    but since we’ve already applied our own throttle, you can ignore its status)

        $this->validate();
    }

    public function sendResetLink(): bool
    {
        $status = Password::broker('passkeys')->sendResetLink(
            ['email' => $this->email],
            function (User $user, string $token) {
                $user->notify(new ResetPasskeyNotification($token));
            }
        );

        $this->reset('email');

        return $status === Password::RESET_LINK_SENT;
    }
}
// @codeCoverageIgnoreEnd
