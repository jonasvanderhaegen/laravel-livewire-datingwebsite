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

final class ForgotPasskeyForm extends Form
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
    public function sendResetUrl(): void
    {

        // 1) IP‐burst guard: max 5/min
        $this->rateLimit(5, $this->shortDuration('auth.passwords.passkeys.throttle'));

        // 2) Account guard: max 2/15min per email
        $this->rateLimitByEmail(2, $this->longDuration(), $this->email, 'forgotPasskey');

        // 3) Now send the link (the broker itself may still throttle internally,
        //    but since we’ve already applied our own throttle, you can ignore its status)
        $status = $this->sendResetLink();

        // 5) Clear the input
        $this->reset('email');

    }

    private function sendResetLink(): bool
    {
        $status = Password::broker('passkeys')->sendResetLink(
            ['email' => $this->email],
            function (User $user, string $token) {
                $user->notify(new ResetPasskeyNotification($token));
            }
        );

        return $status === Password::RESET_LINK_SENT;
    }
}
