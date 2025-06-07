<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Forms\Profile\General;

use Livewire\Attributes\Computed;
use Livewire\Form;
use Modules\Settings\Traits\SelectSummary;

// @codeCoverageIgnoreStart
final class SmokeForm extends Form
{
    use SelectSummary;

    public bool $prefer_not_say = false;

    public ?int $value = null;

    #[Computed('smoke')]
    public function selected(): string
    {
        return $this->getTranslateKeyFromSelectFromConfig(
            $this->value,
            'profile.smoke',
            'name'
        );
    }
}
// @codeCoverageIgnoreEnd
