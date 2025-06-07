<?php

declare(strict_types=1);

namespace Modules\Contact\Livewire\Pages;

use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Masmerise\Toaster\Toaster;
use Modules\Contact\Livewire\Forms\ContactForm;
use Modules\Core\Exceptions\TooManyRequestsException;
use Modules\CustomTheme\Livewire\Layouts\General;

final class Create extends General
{
    public ContactForm $form;

    public function mount(): void
    {
        $this->form->initRateLimitCountdown('sendContactMessage');
    }

    // @codeCoverageIgnoreStart
    public function submit(): void
    {
        try {

            $this->form->sendContactMessage();
            $this->form->initRateLimitCountdown('sendContactMessage');

        } catch (TooManyRequestsException $exception) {
            Toaster::error('too_many_requests.contact');

            $this->form->secondsUntilReset = $exception->secondsUntilAvailable;

            throw ValidationException::withMessages([
                'email' => 'too_many_requests.',
            ]);
        }
    }

    // @codeCoverageIgnoreEnd

    public function render(): View
    {
        return view('contact::livewire.pages.contact')
            ->title(_('Contact'));
    }
}
