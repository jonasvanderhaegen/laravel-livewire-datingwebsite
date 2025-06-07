<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Modules\WebAuthn\Livewire\Actions\GeneratePasskeyAuthenticationOptionsAction;


beforeEach(function () {
    $cleanUrl = Str::of(config('app.url'))
        // drop any leading "http://" or "https://"
        ->replaceMatches('/^https?:\/\//', '')
        // drop any trailing slash
        ->rtrim('/');

    // Ensure a known RP ID
    Config::set('passkey.rp_id', $cleanUrl->value());

    // Clear any existing session data
    Session::flush();
});


it('returns a JSON string and stores it in session under the expected key', function () {
    $action = new GeneratePasskeyAuthenticationOptionsAction();

    $cleanUrl = Str::of(config('app.url'))
        // drop any leading "http://" or "https://"
        ->replaceMatches('/^https?:\/\//', '')
        // drop any trailing slash
        ->rtrim('/');

    $json = $action->execute('unused@example.com');

    // 1) It returns a JSON string
    expect($json)->toBeString();

    // 2) The same JSON is stored in session
    $stored = Session::get('passkey-auth-options');
    expect($stored)->toBe($json);

    // 3) The JSON decodes into an array with the expected keys
    $data = json_decode($json, true);

    expect($data)
        ->toBeArray()
        ->toHaveKeys(['challenge', 'rpId'])
        ->and($data['rpId'])->toBe($cleanUrl->value())
        ->and($data['challenge'])
        ->toBeString()
        ->not->toBe('');

    // 4) rpId should match our config

    // 5) challenge should be a non-empty string

    // 6) challenge should be the same length as Str::random()
});
