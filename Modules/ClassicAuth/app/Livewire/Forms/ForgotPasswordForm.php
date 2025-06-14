<?php

declare(strict_types=1);

namespace Modules\ClassicAuth\Livewire\Forms;

use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Support\Facades\Password;
use Livewire\Form;
use Modules\Core\Concerns\WithRateLimiting;
use Modules\Core\Exceptions\TooManyRequestsException;
use Modules\Core\Rules\StrictEmailDomain;

// @codeCoverageIgnoreStart
final class ForgotPasswordForm extends Form
{
    use WithRateLimiting;

    public string $email = '';

    /**
     * @return array<string, mixed[]> Lists each field’s validation rules.
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

    public function sendResetUrl(): void
    {
        $this->validate();

        // 1) IP‐burst guard: max 5/min
        try {
            $this->rateLimit(5, 60);
        } catch (TooManyRequestsException $e) {
            // bubble up so your Livewire page can show the timer
            throw $e;
        }

        // 2) Account guard: max 2/hr per email
        try {
            $this->rateLimitByEmail(2, 900, $this->email, 'forgotPassword');
        } catch (TooManyRequestsException $e) {
            throw $e;
        }

        // 3) Now send the link (the broker itself may still throttle internally,
        //    but since we’ve already applied our own throttle, you can ignore its status)
        $status = Password::sendResetLink(['email' => $this->email]);

        if ($status === Password::RESET_THROTTLED) {
            $throttle = config('auth.passwords.users.throttle', 60);

            throw new ThrottleRequestsException(
                __(Password::RESET_THROTTLED),
                null,
                ['Retry-After' => $throttle]
            );
        }

        // 5) Clear the input
        $this->reset('email');
    }
}
// @codeCoverageIgnoreEnd
