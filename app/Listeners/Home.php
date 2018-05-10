<?php

namespace App\Listeners;

use App\Events\Home;
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
    public function handle(Home $event)
    {
        //
        $user=$event->user;
    }
}
