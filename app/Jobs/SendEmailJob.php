<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Mail;
use App\Mail\TestEmail;
class SendEmailJob implements ShouldQueue
{
    use Queueable;
    public $email;

    /**
     * Create a new job instance.
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
        {
            Mail::to($this->email)->send(new TestEmail('This is a test email','Test Email')); 

        }
    
}