<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Events\Home;
use Illuminate\Support\Facades\Auth;
use App\Model\ChatMessage;
use App\model\Order;

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


    public function index()
    {
		return $this->success(['game_id'=>123]);

    }
    
    protected function demo(){
		
	}
	
	protected function success($data){
		return [
			'code'=>1,
			'message'=>'success',
			'data'=>$data
		];
	}

    
    
}
