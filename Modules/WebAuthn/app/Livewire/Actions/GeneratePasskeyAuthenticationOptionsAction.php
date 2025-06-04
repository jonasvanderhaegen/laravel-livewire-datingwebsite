<?php

declare(strict_types=1);

namespace Modules\WebAuthn\Livewire\Actions;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Spatie\LaravelPasskeys\Support\Config;
use Spatie\LaravelPasskeys\Support\Serializer;
use Webauthn\Exception\InvalidDataException;
use Webauthn\PublicKeyCredentialRequestOptions;

final class GeneratePasskeyAuthenticationOptionsAction
{
    /**
     * @throws InvalidDataException
     */
    public function execute(?string $email = null): string
    {
        $options = new PublicKeyCredentialRequestOptions(
            challenge: Str::random(),
            rpId: Config::getRelyingPartyId(),
        );

        $options = Serializer::make()->toJson($options);

        Session::put('passkey-auth-options', $options);

        return $options;
    }
}
