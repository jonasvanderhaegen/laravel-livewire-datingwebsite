<?php

declare(strict_types=1);

namespace Modules\WebAuthn\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Modules\Core\Concerns\WithRateLimiting;
use Modules\Core\Rules\StrictDob;
use Modules\Core\Rules\StrictEmailDomain;

final class RegisterForm extends Form
{
    use WithRateLimiting;

    public ?string $name = null;

    #[Validate('required|string|max:255')]
    public string $firstname = '';

    #[Validate('required|string|max:255')]
    public string $lastname = '';

    public string $email = '';

    public string $dob = '';

    public bool $terms = false;

    public function getFullName(): string
    {
        return "{$this->firstname} {$this->lastname}";
    }

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
