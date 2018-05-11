<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ChatMessageWasReceivedListen
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Home  $event
     * @return void
     */
    public function handle(\App\Events\ChatMessageWasReceived $event)
    {
        //
        $user=$event->user;
        $chatMessage=$event->chatMessage;
        //dump($user->toArray());
      //  dump($chatMessage->toArray());
    }
}
