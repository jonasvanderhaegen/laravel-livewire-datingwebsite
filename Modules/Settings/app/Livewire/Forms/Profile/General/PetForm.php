<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Forms\Profile\General;

use Livewire\Attributes\Computed;
use Livewire\Form;
use Modules\Settings\Traits\SelectSummary;

final class PetForm extends Form
{
    use SelectSummary;

    public $pets = [];

    public bool $prefer_not_say = false;

    #[Computed('pets')]
    public function selected(): string
    {
        return $this->summarizeSelect(
            $this->pets,
            'profile.pets',
            'name'
        );
    }
}
