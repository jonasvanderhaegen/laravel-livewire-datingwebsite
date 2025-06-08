<?php

namespace Modules\WebAuthn\Concerns;

use Modules\WebAuthn\Livewire\Actions\GeneratePasskeyRegisterOptionsAction;
use Webauthn\Exception\InvalidDataException;

trait HandlesPasskeys
{
    /**
     * @throws InvalidDataException
     */
    protected function generatePasskeyOptions(): mixed
    {
        /*
        $action = Config::getAction('generate_passkey_register_options',
            GeneratePasskeyRegisterOptionsAction::class);

        $options = $action->execute($this->user);
        */

        $action = app(GeneratePasskeyRegisterOptionsAction::class);
        $options = $action->execute($this->user);

        session()->put('passkey-registration-options', $options);

        return $options;
    }

    protected function previouslyGeneratedPasskeyOptions(): ?string
    {
        return session()->pull('passkey-registration-options');
    }
}
