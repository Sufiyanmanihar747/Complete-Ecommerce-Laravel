<?php

namespace App\Console\Commands;

use App\Mail\SendMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;


class SendMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-mail-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is for Email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::info('Executing SendMailCommand at ' . now());
        Mail::to('bott@gmail.com')->send(new SendMail());
        $this->info('Email sent successfully!');
    }
}
