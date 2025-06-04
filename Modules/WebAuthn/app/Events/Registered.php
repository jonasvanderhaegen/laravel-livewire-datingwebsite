<?php

declare(strict_types=1);

namespace Modules\WebAuthn\Events;

use Illuminate\Foundation\Auth\User;
use Illuminate\Queue\SerializesModels;
use Modules\WebAuthn\Livewire\Forms\RegisterForm;

final class Registered
{
    use SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(public User $user, public RegisterForm $form) {}
}
