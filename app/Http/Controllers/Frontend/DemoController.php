<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Frontend\Controller;
use App\Model\User;
use App\Model\Address;
use App\Model\Post;

class DemoController extends Controller
{


    /**
     * 常用方法
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return parent::index();
    }

    /**
     * 搜索某个字符串之前
     * @return string
     */
    public function search1(){
        return strstr('my name jack.xu','jack',true);
    }


    /**
     * 搜索某个字符串之后
     * @return false|int
     */
    public function search2(){
         preg_match('/jack(.*)/','my name jack.xu',$match);
         return $match[1];
    }

    /**
     * 替换
     * @return string
     */
    public function replace1(){
        $str = 'my name xuhuade';
        dump($str);
        $str= strtr($str,['xuhuade'=>'jack']);
        return $str;
    }

    /**
     * first
     */
    public function first(){
        $user=\DB::table('users')->where('id',9999999999999)->first();
        dump($user);
    }

    /**
     * ajax
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ajax(){
        return view('frontend.demo.ajax');
    }




    
   
}

