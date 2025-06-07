<?php

declare(strict_types=1);

namespace Modules\ClassicAuth\Livewire\Forms;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Modules\Core\Concerns\WithRateLimiting;
use Modules\Core\Exceptions\TooManyRequestsException;
use Modules\Core\Rules\StrictEmailDomain;

final class LoginForm extends Form
{
    use WithRateLimiting;

    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * @return array<string, mixed[]>  Lists each field’s validation rules.
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
            'password' => ['required', 'string'],
        ];
    }

    public function attemptLogin(): void
    {
        // 1) Validate inputs
        $this->validate();

        // 2) IP-based quick throttle: max 5 attempts every 60 seconds
        try {
            $this->rateLimit(5, 60);
        } catch (TooManyRequestsException $e) {
            // let the page component catch & show the countdown
            $this->reset('password');
            throw $e;
        }

        // 3) Try authentication
        if (!Auth::attempt([
            'email' => $this->email,
            'password' => $this->password,
        ], $this->remember)) {
            // 4) On failure, account-level throttle: max 15 failures per hour
            try {
                $this->rateLimitByEmail(15, 3600, $this->email, 'login');
            } catch (TooManyRequestsException $e) {

                $this->reset('password');
                throw $e;
            }

            // 5) Throw validation so Livewire shows the “invalid credentials” error
            throw ValidationException::withMessages([
                'form.email' => __('auth.failed'),
            ]);
        }

        session()->forget(['login_email']);
        // 6) On success, clear any countdown and show success toast
        $this->clearRateLimiter();              // reset the IP bucket
        $this->clearRateLimiter('attemptLogin'); // reset the method bucket
    }
}
