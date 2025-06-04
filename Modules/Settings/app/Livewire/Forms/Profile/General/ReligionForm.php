<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Forms\Profile\General;

use Livewire\Attributes\Computed;
use Livewire\Form;
use Modules\Settings\Traits\SelectSummary;

final class ReligionForm extends Form
{
    use SelectSummary;

    public bool $prefer_not_say = false;

    public ?int $value = null;

    #[Computed('religion')]
    public function selected(): string
    {
        return $this->getTranslateKeyFromSelectFromConfig(
            $this->value,
            'profile.religion',
            'name'
        );
    }
}
