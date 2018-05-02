<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Admin\Controller;

class BladeController extends Controller
{
   
   /**
    * @desc blade模板测试
    * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
    */ 
   function index(){
       $refClass=new \ReflectionClass($this);
       $methods=$refClass->getMethods(\ReflectionMethod::IS_PUBLIC);
       $methods=array_filter($methods,function ($method){
           if($method->class=='App\Http\Controllers\Frontend\BladeController'){
               $method->desc=$this->getDocDesc($method->getDocComment());
               return $method;
           }
       });
       
       return view('frontend.blade',['methods'=>$methods]);
   }
   
   protected function getDocDesc($string){
       if(empty($string)) return '';
       preg_match('/@desc(.*)/', $string,$match);
       if(isset($match[1])){
           return trim($match[1]);
       }else{
           return '';
       }
   }
   
   /**
    * @desc solt演示
    * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
    */
   function solt(){
       return view('frontend.blade.solt');
   }
}

