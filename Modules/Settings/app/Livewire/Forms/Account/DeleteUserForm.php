<?php

declare(strict_types=1);

namespace Modules\Settings\Livewire\Forms\Account;

use Livewire\Form;

final class DeleteUserForm extends Form
{
    /**
     * The user's current password.
     *
     * @var string
     */
    public $email = '';
}
