<?php

declare(strict_types=1);

namespace Modules\ClassicAuth\Livewire\Forms;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Locked;
use Livewire\Form;
use Masmerise\Toaster\Toaster;
use Modules\Core\Concerns\WithRateLimiting;
use Modules\Core\Exceptions\TooManyRequestsException;
use Modules\Core\Rules\StrictEmailDomain;

final class ResetPasswordForm extends Form
{
    use WithRateLimiting;

    #[Locked]
    public string $token = '';

    public string $email = '';

    public string $password = '';

    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'lowercase', 'max:255', new StrictEmailDomain],
            'password' => [
                'required', 'string',
                PasswordRule::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
        ];
    }

    public function resetPassword(): void
    {
        $this->validate();
        // 1) Quick IP‐burst guard: max 5 tries / minute
        try {
            $this->rateLimit(5, 60);
        } catch (TooManyRequestsException $e) {
            throw $e;

            return;
        }

        // 2) Account‐scoped guard: max 3 resets / hour per email
        try {
            $this->rateLimitByEmail(3, 3600, $this->email, 'resetPassword');
        } catch (TooManyRequestsException $e) {
            throw $e;

            return;
        }

        // 3) Attempt the actual password reset
        $status = Password::reset(
            $this->except(['secondsUntilReset']),
            function ($user) {
                $user->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])->save();

                // Automatically log them in
                Auth::login($user);

                event(new PasswordReset($user));
            }
        );

        // 4) Handle each status
        switch ($status) {
            case Password::PASSWORD_RESET:
                // Success! Clear buckets and redirect
                $this->clearRateLimiter();
                $this->clearRateLimiter('resetPassword', $this->email);
                Toaster::success(__($status));

                return;

            case Password::INVALID_TOKEN:
                // Invalid or expired token
                throw ValidationException::withMessages([
                    'token' => Password::INVALID_TOKEN,
                ]);

            default:
                // Fallback for any other broker error
                throw ValidationException::withMessages([
                    'email' => __($status),
                ]);
        }
    }
}
