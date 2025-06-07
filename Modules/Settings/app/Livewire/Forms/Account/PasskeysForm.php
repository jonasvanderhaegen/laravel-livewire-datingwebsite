<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Forms\Account;

use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Modules\Core\Concerns\WithRateLimiting;

// @codeCoverageIgnoreStart
final class PasskeysForm extends Form
{
    use WithRateLimiting;

    #[Validate('required', 'string', 'max:50')]
    public string $name = '';

    #[Computed]
    public function isValid(): bool
    {
        return ! $this->getErrorBag()->any()
            && $this->name !== '';
    }

    public function updatePassword(): void {}
}
// @codeCoverageIgnoreEnd
