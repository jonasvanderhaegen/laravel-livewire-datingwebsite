<?php

declare(strict_types=1);

namespace Modules\WebAuthn\Livewire\Actions;

use Illuminate\Support\Str;
use Spatie\LaravelPasskeys\Models\Concerns\HasPasskeys;
use Spatie\LaravelPasskeys\Support\Config;
use Spatie\LaravelPasskeys\Support\Serializer;
use Webauthn\AuthenticatorSelectionCriteria;
use Webauthn\Exception\InvalidDataException;
use Webauthn\PublicKeyCredentialCreationOptions;
use Webauthn\PublicKeyCredentialRpEntity;
use Webauthn\PublicKeyCredentialUserEntity;

final class GeneratePasskeyRegisterOptionsAction
{
    /**
     * @throws InvalidDataException
     */
    public function execute(
        HasPasskeys $authenticatable,
        bool $asJson = true,
    ): string|PublicKeyCredentialCreationOptions {
        $options = new PublicKeyCredentialCreationOptions(
            rp: $this->relatedPartyEntity(),
            user: $this->generateUserEntity($authenticatable),
            challenge: $this->challenge(),
            authenticatorSelection: $this->authenticatorSelection(),
            attestation: PublicKeyCredentialCreationOptions::ATTESTATION_CONVEYANCE_PREFERENCE_NONE,
            timeout: 120_000
        );

        if ($asJson) {
            $options = Serializer::make()->toJson($options);
        }

        return $options;
    }

    public function authenticatorSelection(): AuthenticatorSelectionCriteria
    {
        return new AuthenticatorSelectionCriteria(
            null,
            AuthenticatorSelectionCriteria::USER_VERIFICATION_REQUIREMENT_PREFERRED,
            AuthenticatorSelectionCriteria::RESIDENT_KEY_REQUIREMENT_REQUIRED
        );
    }

    /**
     * @throws InvalidDataException
     */
    public function generateUserEntity(HasPasskeys $authenticatable): PublicKeyCredentialUserEntity
    {
        return new PublicKeyCredentialUserEntity(
            name: $authenticatable->getPassKeyName(),
            id: $authenticatable->getPassKeyId(),
            displayName: $authenticatable->getPassKeyDisplayName(),
        );
    }

    private function relatedPartyEntity(): PublicKeyCredentialRpEntity
    {
        return new PublicKeyCredentialRpEntity(
            name: Config::getRelyingPartyName(),
            id: Config::getRelyingPartyId(),
            icon: Config::getRelyingPartyIcon(),
        );
    }

    private function challenge(): string
    {
        return Str::random();
    }
}
