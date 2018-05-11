<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Events\Home;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        event(new \App\Events\ChatMessageWasReceived('测试', \App\Model\User::first()));
//         $options = array(
//             'cluster' => 'ap1',
//             'encrypted' => true
//         );
//         $pusher = new \Pusher\Pusher(
//             '4ed3c880c177d2eb6e69',
//             '75fc581c693954d9c784',
//             '523350',
//             $options
//             );
        
//         $data['message'] = '你是谁';
//         $pusher->trigger('my-channel', 'my-event', $data);
        
        //dump(session()->all());
        $user=Auth::user();
        event(new Home($user));
       // dump($user->toArray());
        return view('frontend.home');
    }
    
    
}
