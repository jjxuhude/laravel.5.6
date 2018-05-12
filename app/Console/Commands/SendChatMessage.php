<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\model\Order;

class SendChatMessage extends Command
{
    protected $signature = 'chat:message {message}';

    protected $description = 'Send chat message.';

    public function handle()
    {
        // Fire off an event, just randomly grabbing the first user for now
        $user = \App\Model\User::find($this->argument('message'));
        $message = \App\Model\ChatMessage::create([
            'user_id' => $user->id,
            'message' => $this->argument('message')
        ]);

        $message=Order::find(1);
        event(new \App\Events\ChatMessageWasReceived($message, $user));
    }
}
