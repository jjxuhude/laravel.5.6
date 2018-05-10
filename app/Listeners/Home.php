<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Home
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
    public function handle(\App\Events\Home $event)
    {
        //
        $user=$event->user;
        $user->name="名称已经修改为API";
        //dump($user->toArray());
    }
}
