<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::middleware(['guest', 'throttle:guest-auth'])->group(function () {
    Route::get('login', Modules\WebAuthn\Livewire\Pages\Login::class)->name('login');
    Route::get('register', Modules\WebAuthn\Livewire\Pages\Register::class)->name('register');
    Route::get('lost-passkey', Modules\WebAuthn\Livewire\Pages\LostPasskey::class)->name('passkey.request');
    Route::get('reset-passkey', Modules\WebAuthn\Livewire\Pages\ResetPasskey::class)->middleware([
        'signed', 'throttle:6,1',
    ])->name('passkey.reset');
});

Route::get('passkey-instructions',
    Modules\WebAuthn\Livewire\Pages\Instructions::class)->middleware('throttle:info-pages')->name('passkeys.instructions');
