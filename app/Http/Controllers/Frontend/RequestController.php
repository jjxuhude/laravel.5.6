<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Frontend\Controller;
use App\Services\DocParser;
use Illuminate\Support\Facades\App;

class RequestController extends Controller
{
   
   /**
    * @desc 首页
    * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
    */ 
   function index(){
     return parent::index();
   }
   
   /**
    * @desc path
    * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
    */
   function path(){
       dump(request()->path());
   }
   
   
   
   /**
    * @desc url
    */
   function url(){
       dump(request()->url());
   }
   
   /**
    * @desc method
    */
   function method(){
       dump(request()->method());
   }
   
   /**
    * @desc query
    */
   function query(){
       dump(request()->query('name'));
   }
   

   /**
    * @desc doc
    * @param Illuminate\Support\Facades\App $aaa
    * @param int $bbb
    */
   function doc($aaa=0,$bbb=1){
       dump(resolve('docParser')->parse(new \ReflectionMethod($this,'doc')));
   }
}

