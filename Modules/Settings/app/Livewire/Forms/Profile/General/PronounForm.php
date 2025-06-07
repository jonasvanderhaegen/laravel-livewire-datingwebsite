<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Forms\Profile\General;

use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Modules\Settings\Traits\SelectSummary;

// @codeCoverageIgnoreStart
final class PronounForm extends Form
{
    use SelectSummary;

    public bool $prefer_not_say = false;

    #[Validate('required', 'string', 'max:50')]
    public ?string $value = null;

    #[Validate('required_if:pronouns,custom', 'string', 'max:60')]
    public ?string $custom_pronouns = null;

    #[Computed('pronouns')]
    public function selected(): string
    {
        return $this->getTranslateKeyFromSelectFromConfig(
            $this->value,
            'profile.pronouns',
            'name',
            $this->custom_pronouns
        );
    }
}
// @codeCoverageIgnoreEnd
