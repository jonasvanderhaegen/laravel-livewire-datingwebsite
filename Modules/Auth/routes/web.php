<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Auth\Livewire\Actions\Logout;

Route::post('logout', Logout::class)
    ->middleware(['auth', 'throttle:guest-auth'])
    ->name('logout');

// Authenticated user actions: settings & messages
Route::middleware(['auth', 'throttle:user-actions'])->group(function () {
    Route::get('verify-email', Modules\Auth\Livewire\VerifyEmail::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', Modules\Auth\Http\Controllers\VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
});
