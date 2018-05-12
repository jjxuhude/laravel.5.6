<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class Message extends Event implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
	
	public $message;
    public $user;


    
   public function __construct($message, $user)
    {
        $this->message = $message;
        $this->user = $user;
    }

    /**
     * 指定广播频道(对应前端的频道)
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return new Channel('message');
    }
    
    /**
     * 事件的广播名称.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'server.created';
    }
    
    
    /**
     * 获取广播数据
     *
     * @return array
     */
    public function broadcastWith(){
        return ['id' => $this->message];
    }

//     /**
//      * 判定事件是否广播
//      *
//      * @return bool
//      */
//     public function broadcastWhen()
//     {
//         return true;
//     }   

}
