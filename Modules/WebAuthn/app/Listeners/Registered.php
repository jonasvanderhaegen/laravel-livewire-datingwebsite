<?php

declare(strict_types=1);

namespace Modules\WebAuthn\Listeners;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\WebAuthn\Events\Registered as Event;

// @codeCoverageIgnoreStart
final class Registered implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(Event $event): void
    {
        /** @var User $user */
        $user = $event->user;

        $profile = $user->profile()->update([
            'first_name' => $event->form->firstname,
            'last_name' => $event->form->lastname,
            'birth_date' => Carbon::createFromFormat('d-m-Y', $event->form->dob)
                ->format('Y-m-d'),
        ]);

        // $profile->preferences()->create();
    }
}
// @codeCoverageIgnoreEnd
