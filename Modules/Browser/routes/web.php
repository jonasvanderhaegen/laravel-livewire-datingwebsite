<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Browser\Livewire\Pages\Index;
use Modules\Browser\Livewire\Pages\Likes;
use Modules\Browser\Livewire\Pages\Show;

Route::get('likes', Likes::class)->name('likes');
Route::get('/', Index::class)->name('index');
Route::get('/{profile:ulid}', Show::class)->name('show');
