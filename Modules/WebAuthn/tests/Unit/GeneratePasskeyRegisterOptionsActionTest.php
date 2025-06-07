<?php

use Modules\WebAuthn\Livewire\Actions\GeneratePasskeyRegisterOptionsAction;
use Spatie\LaravelPasskeys\Models\Concerns\HasPasskeys;
use Spatie\LaravelPasskeys\Models\Concerns\InteractsWithPasskeys;

it('generates valid registration options JSON when given a HasPasskeys user', function () {
    $action = new GeneratePasskeyRegisterOptionsAction();

    // Create a dummy authenticatable that implements the HasPasskeys interface
    // and uses the InteractsWithPasskeys trait for the real logic.
    $stubUser = new class implements HasPasskeys {
        use InteractsWithPasskeys;

        // You must set an identifier and display name for the user:
        public function getPassKeyName(): string
        {
            return 'jane.doe@example.com';
        }

        public function getPassKeyId(): string
        {
            // Must be a base64‐encoded string or similar
            return base64_encode('user-1');
        }

        public function getPassKeyDisplayName(): string
        {
            return 'Jane Doe';
        }

        // The InteractsWithPasskeys trait expects these properties on the model:
        public int $id = 1;
    };

    // When asJson=true (the default), it should return a JSON string
    $json = $action->execute($stubUser, asJson: true);

    // It should be valid JSON, and decode into the standard Webauthn registration options
    $payload = json_decode($json, true);
    expect($payload)->toBeArray()
        ->and($payload)->toHaveKeys(['challenge', 'rp', 'user', 'authenticatorSelection', 'attestation', 'timeout']);


    $cleanUrl = Str::of(config('app.url'))
        // drop any leading "http://" or "https://"
        ->replaceMatches('/^https?:\/\//', '')
        // drop any trailing slash
        ->rtrim('/');

    expect($payload['rp']['id'])->toBe($cleanUrl->value());

    // Now also test that execute(..., asJson: false) returns the raw PublicKeyCredentialCreationOptions object
    $object = $action->execute($stubUser, asJson: false);
    expect($object)->toBeInstanceOf(\Webauthn\PublicKeyCredentialCreationOptions::class);
});
