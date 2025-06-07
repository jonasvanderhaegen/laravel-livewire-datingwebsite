<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Forms\Profile\General;

use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Modules\Settings\Traits\SelectSummary;

// @codeCoverageIgnoreStart
final class RelationshipForm extends Form
{
    use SelectSummary;

    #[Validate('required')]
    public ?int $value = null;

    #[Computed('pronouns')]
    public function selected(): string
    {
        return $this->getTranslateKeyFromSelectFromConfig(
            $this->value,
            'profile.relationship_type',
            'name'
        );
    }
}
// @codeCoverageIgnoreEnd
