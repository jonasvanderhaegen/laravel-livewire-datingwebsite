<?php

declare(strict_types=1);

return [
    'name' => 'WebAuthn',
    'passwords' => [
        'passkeys' => [
            'provider' => 'users',            // your user provider
            'table' => 'passkey_reset_tokens',   // your reset‐tokens table
            'expire' => 60,                 // minutes until token expiry
            'throttle' => 60,                 // minutes until you can re‐request
        ],
    ],
];
