<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Forms\Profile\General;

use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Modules\Settings\Traits\SelectSummary;

// @codeCoverageIgnoreStart
final class PoliticsForm extends Form
{
    use SelectSummary;

    #[Validate('boolean')]
    public bool $prefer_not_say = false;

    #[Validate('required_unless:prefer_not_say,true', 'integer')]
    public ?int $value = null;

    #[Computed('politics')]
    public function selected(): string
    {
        return $this->getTranslateKeyFromSelectFromConfig(
            $this->value,
            'profile.politics',
            'name'
        );
    }
}
// @codeCoverageIgnoreEnd
