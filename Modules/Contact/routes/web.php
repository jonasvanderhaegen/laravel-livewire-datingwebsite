<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Contact\Livewire\Pages\Create;

Route::middleware(['throttle:contact-form'])->group(function () {
    Route::get('contact', Create::class)->name('create');
});
