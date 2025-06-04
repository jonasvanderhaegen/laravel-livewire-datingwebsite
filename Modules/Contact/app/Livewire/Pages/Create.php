<?php

declare(strict_types=1);

namespace Modules\Contact\Livewire\Pages;

use Illuminate\Validation\ValidationException;
use Masmerise\Toaster\Toaster;
use Modules\Contact\Livewire\Forms\ContactForm;
use Modules\Core\Exceptions\TooManyRequestsException;
use Modules\CustomTheme\Livewire\Layouts\General;

final class Create extends General
{
    public ContactForm $form;

    public function mount()
    {
        $this->form->initRateLimitCountdown('sendContactMessage');
    }

    public function submit()
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

    public function render()
    {
        return view('page::livewire.contact')
            ->title(_(('Contact')));
    }
}
