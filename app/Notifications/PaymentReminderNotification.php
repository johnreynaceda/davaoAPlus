<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentReminderNotification extends Notification
{
    use Queueable;

    public $due_date;
    /**
     * Create a new notification instance.
     */
    public function __construct($due_date)
    {
        $this->due_date = $due_date;
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
                    // ->line('The introduction to the notification.')
                    
                    // ->line('Due Date:'. Carbon::parse($this->due_date)->format('F d, Y'));
                    ->subject('Reminder: Upcoming Due Date on ' . Carbon::parse($this->due_date)->format('F d, Y'))
            ->greeting('Hello!')
            ->line('This is a friendly reminder that you have an upcoming due date approaching:')
            ->line('**Due Date:** ' . Carbon::parse($this->due_date)->format('F d, Y'))
            ->line('Please take the necessary actions before this date.')
            ->action('View Your Dashboard', url('/dashboard'))
            ->line('Thank you for using our application!');
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
