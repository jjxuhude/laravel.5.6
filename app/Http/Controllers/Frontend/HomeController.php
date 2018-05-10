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
        //dump(session()->all());
        $user=Auth::user();
        event(new Home($user));
        dump($user->toArray());
        return view('frontend.home');
    }
    
    
}
