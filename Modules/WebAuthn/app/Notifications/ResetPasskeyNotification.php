<?php

declare(strict_types=1);

namespace Modules\WebAuthn\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

final class ResetPasskeyNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(protected string $token)
    {
        $this->token = $token;

    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        $url = URL::temporarySignedRoute(
            'passkey.reset',               // named route
            Carbon::now()->addMinutes(60),      // expiration
            ['token' => $this->token, 'email' => $notifiable->email]
        );

        return (new MailMessage)
            ->subject(__('Reset Your Passkey'))
            ->line(__('You requested a passkey reset. Click below to choose a new one.'))
            ->action(__('Reset Passkey'), $url)
            ->line(__('If you did not request this, no further action is needed.'));
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray($notifiable): array
    {
        return [];
    }
}
