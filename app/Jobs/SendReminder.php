<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\PaymentReminderNotification;
use Carbon\Carbon;
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
        $ch = curl_init();
        $parameters = [
            'apikey' => '046125f45f4f187e838905df98273c4e', // Your API KEY
            'number' => $this->user->contact,
            'message' => "DAVAO A+\n\nReminder: Your loan payment is due on " . Carbon::parse($this->due_date)->format('F d, Y') .
                ". Please make your payment on time to avoid penalties. Contact us if you need assistance.",
            'sendername' => 'Estanz',
        ];

        curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $output = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 200) {
            \Log::error('SMS sending failed: ' . $output);
        } else {
            \Log::info('SMS sent successfully: ' . $output);
        }
    }
}
