<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MemberMessageNotification extends Notification
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
                ->subject("Message de membre " . config('app.name'))
                ->greeting("Bonjour cher membre")
                ->line('Le membre ' . $this->fullname . " vous a envoyé un message")
                ->line('Message : ' . $this->message)
                ->salutation('Message envoyé depuis ' . config('app.member_url'));
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
