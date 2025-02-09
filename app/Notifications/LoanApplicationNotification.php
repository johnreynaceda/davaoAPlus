<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LoanApplicationNotification extends Notification
{
    use Queueable;

    public $user;
    public $applicantName;
    /**
     * Create a new notification instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
        $this->applicantName = $this->user->name;
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
        ->greeting('Congratulations, ' . $this->applicantName .'!')
        ->line('Your application has been approved.')
        ->line('Thank you for applying!');
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
