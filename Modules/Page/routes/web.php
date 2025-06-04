<?php

declare(strict_types=1);

Route::get('/', Modules\Page\Livewire\Pages\Home::class)
    ->name('home');

Route::get('terms-and-conditions', Modules\Page\Livewire\Pages\TermsConditions::class)
    ->name('terms-and-conditions');

Route::get('safety', Modules\Page\Livewire\Pages\Safety::class)->name('safety');

Route::get('donations', Modules\Page\Livewire\Pages\Support::class)->name('support');
