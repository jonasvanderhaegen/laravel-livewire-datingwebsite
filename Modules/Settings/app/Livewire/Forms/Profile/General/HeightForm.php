<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Forms\Profile\General;

use Livewire\Form;

// @codeCoverageIgnoreStart
final class HeightForm extends Form
{
    public bool $prefer_not_say = false;

    public ?int $value = null;
}
// @codeCoverageIgnoreEnd
