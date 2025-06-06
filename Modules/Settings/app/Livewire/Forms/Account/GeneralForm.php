<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Forms\Account;

use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Modules\Core\Rules\StrictDob;

final class GeneralForm extends Form
{
    #[Validate('required|string|max:255')]
    public string $name = '';

    #[Validate('required|string|max:255')]
    public string $first_name = '';

    #[Validate('required|string|max:255')]
    public string $last_name = '';

    public string $birth_date = '';

    public function rules(): array
    {
        return [
            'birth_date' => ['required', 'string', new StrictDob],

        ];
    }

    #[Computed]
    public function isValid(): bool
    {
        return ! empty($this->name)
            && ! empty($this->birth_date)
            && ! $this->getErrorBag()->any();
    }
}
