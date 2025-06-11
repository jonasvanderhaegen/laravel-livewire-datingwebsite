<?php

declare(strict_types=1);

Route::get('contact', Modules\Contact\Livewire\Pages\Contact::class)->name('contact.create')->middleware('throttle:contact-form');
