<?php

declare(strict_types=1);

namespace Modules\Auth\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

final class EmailUsageAlert extends Notification
{
    use Queueable;

    protected string $ip;

    protected string $time;

    /**
     * Create a new notification instance.
     */
    public function __construct(string $ip, string $time)
    {
        $this->ip = $ip;
        $this->time = $time;
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
        return (new MailMessage)
            ->subject('Someone Tried to Register with Your Email')
            ->greeting("Hi {$notifiable->name},")
            ->line("On {$this->time}, someone attempted to register at {$this->ip} using your email address.")
            ->line('If this was you, you can safely ignore this message.')
            ->line('If you did **not** try to register, your account is actually safe due to passkey authentication. The person does not know if your account exists or not.')
            ->line('Thank you for using our application.');
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray($notifiable): array
    {
        return [];
    }
}
