<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\model\Order;

class Demo1 extends Command
{
    //use Brand;

    protected $signature = 'demo1:send {message} {user}';

    protected $description = 'Send chat message.';




    public function handle()
    {
        // Fire off an event, just randomly grabbing the first user for now
        $message = $this->argument('message');
        \Log::debug($message);
        dump($message);
        dump($this->argument('user'));
       // dump($this->option('brand_code'));
        dump("APPID:".env('APPID'));
        dump("SECRET:".env('SECRET'));
        dump("MAIL_USERNAME:".env('MAIL_USERNAME'));

    }
}
