<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Forms\Account;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Computed;
use Livewire\Form;
use Modules\Core\Concerns\WithRateLimiting;
use Modules\Core\Exceptions\TooManyRequestsException;

final class UpdatePasswordForm extends Form
{
    use WithRateLimiting;

    public string $current_password = '';

    public string $password = '';

    /**
     * @return array<string, array<int, Password|string>>
     */
    public function rules(): array
    {
        return [
            'current_password' => [
                'required',
                'string',
                'current_password',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols(),
            ],
            'password' => [
                'required',
                'string',
                'different:current_password',  // <-- must not match the old one
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols(),
            ],
        ];
    }

    #[Computed]
    public function isValid(): bool
    {
        return ! $this->getErrorBag()->any()
            && $this->current_password !== ''
            && $this->password !== ''
            && $this->password !== $this->current_password;
    }

    public function updatePassword(): void
    {
        $this->validate();

        $user = Auth::user();

        // 1) Quick IP‐burst guard: max 5 tries / minute
        try {
            $this->rateLimit(5, 60);
        } catch (TooManyRequestsException $e) {
            $this->reset('password', 'current_password');
            throw $e;
        }

        // 2) Per‐user hourly guard: max 10 changes / hour per user ID
        try {
            // we key by user ID, so pass that in as the “component”
            $this->rateLimit(10, 3600, 'updatePassword', (string) $user->id);
        } catch (TooManyRequestsException $e) {
            $this->reset('password', 'current_password');
            throw $e;
        }

        // 3) All good → apply the change
        $user->update(['password' => Hash::make($this->password)]);
        $this->reset();

        // 4) Clear both buckets now that it succeeded
        $this->clearRateLimiter();                  // clears the IP bucket
        $this->clearRateLimiter('updatePassword', (string) $user->id);

        // $this->dispatchBrowserEvent('saved');

        // return true;

        // Auth::user()->update([
        //     'password' => Hash::make($this->password),
        // ]);

        // return true;
    }
}
