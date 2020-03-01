<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Frontend\Controller;
use App\Model\User;
use App\Model\Address;
use App\Model\Post;

class DemoController extends Controller
{


    public function index()
    {
        $data = $this->start_game();
        $data = $this->get_game_top_list();

        return $this->success($data);

    }

    protected function start_game(){
        return    $data=[
            'game_id'=>123,
            'open_id'=>'1234567890',
            'start_time'=>'2019-11-25 16:07:25'
        ];;
    }

    protected function get_game_top_list(){
        return
        ['top'=>[
            [
                'game_id'=>1,
                'open_id'=>'1234567890',
                'nicename'=>'jack.xu1',
                'score'=>200,
                'start_time'=>'2019-11-25 16:07:25'
            ],
            [
                'game_id'=>2,
                'open_id'=>'1234567890',
                'nicename'=>'jack.xu2',
                'score'=>190,
                'start_time'=>'2019-11-25 16:07:25'
            ],
            [
                'game_id'=>3,
                'open_id'=>'1234567890',
                'nicename'=>'jack.xu3',
                'score'=>180,
                'start_time'=>'2019-11-25 16:07:25'
            ],
            [
                'game_id'=>4,
                'open_id'=>'1234567890',
                'nicename'=>'jack.xu4',
                'score'=>170,
                'start_time'=>'2019-11-25 16:07:25'
            ],
            [
                'game_id'=>5,
                'open_id'=>'1234567890',
                'nicename'=>'jack.xu5',
                'score'=>160,
                'start_time'=>'2019-11-25 16:07:25'
            ]
        ],
            'own'=>[
                'game_id'=>123,
                'open_id'=>'1234567890',
                'nicename'=>'jack.xu',
                'score'=>150,
                'start_time'=>'2019-11-25 16:07:25'
            ]
        ];
    }



    protected function success($data){
        return [
            'code'=>1,
            'message'=>'success',
            'data'=>$data
        ];
    }

    
   
}

