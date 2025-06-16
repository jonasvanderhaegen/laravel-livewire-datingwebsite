<?php

declare(strict_types=1);

return [
    'models' => [
        'passkey' => Modules\WebAuthn\Models\Passkey::class,
    ],
    'actions' => [
        'generate_passkey_register_options' => Modules\WebAuthn\Actions\GeneratePasskeyRegisterOptionsAction::class,
    ],
];
