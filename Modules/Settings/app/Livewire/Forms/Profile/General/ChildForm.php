<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Forms\Profile\General;

use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Modules\Settings\Traits\SelectSummary;

// @codeCoverageIgnoreStart
final class ChildForm extends Form
{
    use SelectSummary;

    #[Validate('required_unless:prefer_not_say,true', 'integer')]
    public ?int $value = null;

    public bool $prefer_not_say = false;

    #[Computed('children')]
    public function selected(): string
    {
        return $this->getTranslateKeyFromSelectFromConfig(
            $this->value,
            'profile.children',
            'name'
        );
    }
}
// @codeCoverageIgnoreEnd
