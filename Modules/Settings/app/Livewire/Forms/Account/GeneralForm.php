<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Forms\Account;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Modules\Core\Rules\StrictDob;

// @codeCoverageIgnoreStart
final class GeneralForm extends Form
{
    #[Validate('required|string|max:255')]
    public string $first_name = '';

    #[Validate('required|string|max:255')]
    public string $last_name = '';

    public string $birth_date = '';

    /**
     * @return array<string, array<int,StrictDob|string>>
     */
    public function rules(): array
    {
        return [
            'birth_date' => ['required', 'string', new StrictDob],

        ];
    }
}
// @codeCoverageIgnoreEnd
