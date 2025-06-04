<?php

declare(strict_types=1);

use Modules\Settings\Livewire\Actions\DeletePasskey;
use Modules\Settings\Livewire\Actions\DeleteUser;

Route::get('settings/account', Modules\Settings\Livewire\Pages\Account::class)->name('account');
Route::get('settings/images', Modules\Settings\Livewire\Pages\Images::class)->name('images');
Route::get('settings/profile', Modules\Settings\Livewire\Pages\Profile::class)->name('profile');
Route::get('settings/preferences', Modules\Settings\Livewire\Pages\Preferences::class)->name('preferences');
Route::get('settings/profile-preview', Modules\Settings\Livewire\Pages\ProfilePreview::class)->name('profile-preview');

Route::delete('delete', DeleteUser::class)
    ->name('delete-user');

Route::delete('passkey/{passkey}', DeletePasskey::class)
    ->name('passkeys.destroy');
