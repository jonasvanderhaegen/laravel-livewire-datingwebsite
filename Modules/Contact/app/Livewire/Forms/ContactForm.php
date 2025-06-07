<?php

declare(strict_types=1);

namespace Modules\Contact\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Masmerise\Toaster\Toaster;
use Modules\Core\Concerns\WithRateLimiting;

// @codeCoverageIgnoreStart
final class ContactForm extends Form
{
    use WithRateLimiting;

    #[Validate('required|string')]
    public string $name = '';

    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('string')]
    public string $phone = '';

    #[Validate('required|string')]
    public string $subject = '';

    #[Validate('required|string')]
    public string $message = '';

    public function sendContactMessage(): void
    {
        $this->validate();

        $this->rateLimit(1, 5 * 60);

        ray($this->all());

        Toaster::success('Thank you—we’ve received your message!');
        $this->reset();
    }
}
// @codeCoverageIgnoreEnd
