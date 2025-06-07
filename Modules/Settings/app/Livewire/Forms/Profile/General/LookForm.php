<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Forms\Profile\General;

use Livewire\Form;

// @codeCoverageIgnoreStart
final class LookForm extends Form
{
    public bool $height_prefer_not_say = false;

    public ?int $height = 150;
}
// @codeCoverageIgnoreEnd
