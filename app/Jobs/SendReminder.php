<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\PaymentReminderNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SendReminder implements ShouldQueue
{
    use Queueable;
    
    public $user;
    public $due_date;

    /**
     * Create a new job instance.
     */
    public function __construct($user, $due_date)
    {
        $this->user = $user;
        $this->due_date = $due_date;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->user->notify(new PaymentReminderNotification(now()));
    }
}
