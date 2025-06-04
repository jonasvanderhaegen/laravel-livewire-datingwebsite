<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\OnboardUser\Livewire\Finalstep;
use Modules\OnboardUser\Livewire\Step1;
use Modules\OnboardUser\Livewire\Step2;
use Modules\OnboardUser\Livewire\Step3;
use Modules\OnboardUser\Livewire\Step4;

Route::get('step-1', Step1::class)->name('step1');
Route::get('step-2', Step2::class)->name('step2');
Route::get('step-3', Step3::class)->name('step3');
Route::get('step-4', Step4::class)->name('step4');
Route::get('final', Finalstep::class)->name('finalstep');
