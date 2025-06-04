<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Testimonial\Livewire\Pages\Index;

Route::get('testimonials', Index::class)->name('testimonials.index');
