<?php

declare(strict_types=1);

namespace Modules\WebAuthn\Concerns;

use Modules\WebAuthn\Actions\GeneratePasskeyRegisterOptionsAction;
use Spatie\LaravelPasskeys\Support\Config;
use Webauthn\Exception\InvalidDataException;

// @codeCoverageIgnoreStart
trait HandlesPasskeys
{
    /**
     * @throws InvalidDataException
     */
    protected function generatePasskeyOptions(): mixed
    {
        $action = Config::getAction('generate_passkey_register_options',
            GeneratePasskeyRegisterOptionsAction::class);

        $options = $action->execute($this->user);

        session()->put('passkey-registration-options', $options);

        return $options;
    }

    protected function previouslyGeneratedPasskeyOptions(): ?string
    {
        return session()->pull('passkey-registration-options');
    }
}
// @codeCoverageIgnoreEnd
