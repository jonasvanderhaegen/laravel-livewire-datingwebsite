<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Forms\Profile\General;

use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Form;
use Modules\Settings\Traits\SelectSummary;

final class PetForm extends Form
{
    use SelectSummary;

    /**
     * @var Collection<int,mixed>|null
     */
    public ?Collection $pets = null;

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
