<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::middleware(['guest', 'throttle:guest-auth'])->group(function () {
    Route::get('login', Modules\ClassicAuth\Livewire\Login::class)->name('login');
    Route::get('register', Modules\ClassicAuth\Livewire\Register::class)->name('register');
    Route::get('forgot-password', Modules\ClassicAuth\Livewire\Forgot::class)->name('password.request');
    Route::get('reset-password', Modules\ClassicAuth\Livewire\Reset::class)->name('password.reset');
});
