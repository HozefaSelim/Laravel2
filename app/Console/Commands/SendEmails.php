<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:emails {user : The ID of the user}
                        {--queue : Whether the job should be queued}';
 

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send emails to the users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Emails sended successfully " . $this->argument('user')[0] .' '. $this->option('queue'));
    }
}
