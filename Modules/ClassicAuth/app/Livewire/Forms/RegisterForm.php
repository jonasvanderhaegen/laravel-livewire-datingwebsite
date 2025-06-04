<?php

declare(strict_types=1);

namespace Modules\ClassicAuth\Livewire\Forms;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Modules\Core\Concerns\WithRateLimiting;
use Modules\Core\Exceptions\TooManyRequestsException;
use Modules\Core\Rules\StrictDob;
use Modules\Core\Rules\StrictEmailDomain;

final class RegisterForm extends Form
{
    use WithRateLimiting;

    #[Validate('required', 'string', 'max:255')]
    public string $name = '';

    public string $email = '';

    public string $dob = '';

    public string $password = '';

    #[Validate('required|accepted')]
    public bool $confirm = false;

    public int $secondsUntilReset = 0;

    public function rules(): array
    {
        return [
            'dob' => ['required', 'string', new StrictDob],
            'email' => [
                'required', 'email', 'lowercase', 'max:255',
                new StrictEmailDomain,
                Rule::unique(User::class, 'email'),
            ],
            'password' => [
                'required', 'string',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
        ];
    }

    #[Computed]
    public function isFormValid(): bool
    {
        return ! $this->getErrorBag()->any()
            && $this->name !== ''
            && $this->email !== ''
            && $this->dob !== ''
            && $this->password !== ''
            && $this->confirm === true;
    }

    public function attemptRegister(): void
    {
        // 1) Validate all inputs
        $this->validate();

        // 2) IP-based quick throttle: max 5 registrations per minute
        try {
            $this->rateLimit(5, 60);
        } catch (TooManyRequestsException $e) {
            // clear sensitive fields
            $this->reset('password');
            throw $e;
        }

        // 3) Account-level throttle: max 3 registrations per hour per email
        try {
            $this->rateLimitByEmail(3, 3600, $this->email, 'register');
        } catch (TooManyRequestsException $e) {
            $this->reset('password');
            throw $e;
        }

        // 4) Create and log in the user
        event(new Registered(
            $user = User::create($this->except(['dob', 'confirm', 'secondsUntilReset']))
        ));

        Auth::login($user);

        // 5) Clear any stored countdowns
        $this->clearRateLimiter();                 // clear IP bucket
        $this->clearRateLimiter('attemptRegister'); // clear method bucket
    }
}
