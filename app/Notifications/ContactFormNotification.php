<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactFormNotification extends Notification
{
    use Queueable;

    public string $fullname;
    public string $email;
    public string $message;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        string $fullname,
        string $email,
        string $message)
    {
        $this->fullname = $fullname;
        $this->email = $email;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject("Formulaire de contact " . config('app.name'))
                    ->greeting("Hello admin")
                    ->line('Un utilisateur à rempli le  formulaire de contact.')
                    ->line('Nom : ' . $this->fullname)
                    ->line('Email : ' . $this->email)
                    ->line('Message : ' . $this->message)
                    ->salutation('Message envoyé depuis ' . config('app.url'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
