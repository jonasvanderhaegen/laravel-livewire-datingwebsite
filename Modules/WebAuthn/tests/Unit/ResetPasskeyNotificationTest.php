<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Route;
use Modules\WebAuthn\Notifications\ResetPasskeyNotification;

use function Pest\Laravel\route;

beforeEach(function () {
    // Freeze time so our temporarySignedRoute expiration is predictable
    // Carbon::setTestNow('2025-06-07 12:00:00');

    // Define the named route so URL::temporarySignedRoute() can resolve it
    Route::get('/reset-passkey', fn () => '')->name('passkey.reset');
});

it('builds a mail message with a valid signed reset-passkey URL', function () {
    // 1) Make a fake User with a known email
    $user = User::factory()->make([
        'email' => 'test@example.com',
    ]);

    // 2) Instantiate the notification
    $notification = new ResetPasskeyNotification('my-token-123');

    // 3) Generate the MailMessage
    $mail = $notification->toMail($user);

    // 4) Assertions on the MailMessage object
    expect($mail)
        ->toBeInstanceOf(MailMessage::class)
        ->and($mail->subject)->toBe('Reset Your Passkey')
        ->and($mail->introLines)
        ->toContain('You requested a passkey reset. Click below to choose a new one.')
        ->and($mail->actionText)->toBe('Reset Passkey');

    // 5) Extract the action URL
    $url = $mail->actionUrl;

    // It should point to our named route
    expect($url)->toContain('/reset-passkey')
        ->and($url)->toContain('token=my-token-123')
        ->and($url)->toContain('email=test%40example.com');
});

it('implements via() to send mail', function () {
    $user = User::factory()->make();
    $notification = new ResetPasskeyNotification('irrelevant');
    expect($notification->via($user))->toBe(['mail']);
});

it('returns an empty array for toArray()', function () {
    $user = User::factory()->make(['email' => 'foo@bar.test']);
    $notification = new ResetPasskeyNotification('any-token');

    $array = $notification->toArray($user);

    expect($array)
        ->toBeArray()
        ->toBeEmpty();
});
