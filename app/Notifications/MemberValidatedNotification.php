<?php

namespace App\Notifications;

use App\Models\Member;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MemberValidatedNotification extends Notification
{
    use Queueable;

    public Member $member;

    /**
     * Create a new notification instance.
     */
    public function __construct(Member $member)
    {
        $this->member = $member;
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
        $representative_name = $this->member->representative_fullname;

        return (new MailMessage)
                    ->subject("Beluci: Validation de votre demande d'adhésion")
                    ->line("Bonjour $representative_name.")
                    ->line("Votre demande d'adhésion à la Beluci a été validée.")
                    ->line("Vous pouvez accéder à votre espace membre en cliquant sur le lien ci-dessous.")
                    ->line("Idenfiant : " . $this->member->email)
                    ->line("Mot de passe : " . substr($this->member->company_name, 0, 3) . "1234")
                    ->action('Espace membre', url(config('app.member_url')))
                    ->line('Merci à vous!');
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
