<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\model\Order;

class Message extends Command
{
    protected $signature = 'message:send {message}';

    protected $description = 'Send chat message.';

    public function handle()
    {
        // Fire off an event, just randomly grabbing the first user for now
        $user = \App\Model\User::find(1);
        $message = $this->argument('message');
        event(new \App\Events\Message($message, $user));
    }
}
