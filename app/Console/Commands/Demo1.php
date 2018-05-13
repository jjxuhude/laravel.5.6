<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\model\Order;

class Demo1 extends Command
{
    protected $signature = 'demo1:send {message}';

    protected $description = 'Send chat message.';

    public function handle()
    {
        // Fire off an event, just randomly grabbing the first user for now
        $message = $this->argument('message');
        \Log::info($message);
    }
}
