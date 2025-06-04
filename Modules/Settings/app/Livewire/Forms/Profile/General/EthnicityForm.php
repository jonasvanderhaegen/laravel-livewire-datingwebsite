<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Forms\Profile\General;

use Livewire\Attributes\Computed;
use Livewire\Form;
use Modules\Settings\Traits\SelectSummary;

final class EthnicityForm extends Form
{
    use SelectSummary;

    public bool $prefer_not_say = false;

    public $ethnicities = [];

    public function rules(): array
    {
        return [
            'ethnicities' => ['required_unless:prefer_not_say,true', 'array'],
            'ethnicities.*' => ['integer'], // each item should be an integer value
            'prefer_not_say' => ['boolean'],
        ];
    }

    #[Computed('ethnicities')]
    public function selected(): string
    {
        return $this->summarizeSelect(
            $this->ethnicities,
            'profile.ethnicities'         // your config key
        );
    }
}
