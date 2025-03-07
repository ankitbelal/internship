<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-email-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command will send an email to the user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        
        $this->info('Email is sent successfully');
       
        
    }
}
