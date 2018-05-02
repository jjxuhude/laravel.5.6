<?php

use App\Http\Controllers\Frontend\BladeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//前台
Route::group(['namespace'=>'Frontend'],function (){
    Route::get('/', function () {
        return view('frontend.welcome');
    });
    Route::get('/home', 'HomeController@index')->name('home');
    Auth::routes();
    
    $methods=setControllerRoute(BladeController::class);
 
});


Route::group(['prefix'=>'admin','namespace'=>'Admin'],function (){
    Route::get('/','Home\IndexController@index');
    
    Route::get('login', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout');
    Route::get('register', 'Auth\RegisterController@showRegistrationForm');
    Route::post('register', 'Auth\RegisterController@register');
    
});




function setControllerRoute($controller){
    $refClass=new \ReflectionClass($controller);
    $methods=$refClass->getMethods(\ReflectionMethod::IS_PUBLIC);
    $methods=array_filter($methods,function ($method) use ($refClass){
        if($method->class==$refClass->getName()){
            return $method;
        }
    });
    foreach($methods as $method){
        $route=strtolower(strstr(basename($method->class),'Controller',true));
        if($method->name=='index'){
            Route::get('/'.$route,'\\'.$method->class."@".$method->name);
        }
        
        switch (getDocParam($method->getDocComment(), 'method')) {
            case 'post':
                Route::post('/'.$route.'/'.$method->name,'\\'.$method->class."@".$method->name);
            break;
            case 'put':
                Route::put('/'.$route.'/'.$method->name,'\\'.$method->class."@".$method->name);
            break;
            case 'delete':
                Route::delete('/'.$route.'/'.$method->name,'\\'.$method->class."@".$method->name);
            break;
            case 'option':
                Route::option('/'.$route.'/'.$method->name,'\\'.$method->class."@".$method->name);
                break;
            case 'patch':
                Route::patch('/'.$route.'/'.$method->name,'\\'.$method->class."@".$method->name);
                break;
            case 'get':
            default:
                  Route::get('/'.$route.'/'.$method->name,'\\'.$method->class."@".$method->name);
            break;
        }
 
    }
}

//后台


function getDocParam($string,$name){
    if(empty($string)) return '';
    preg_match('/@'.$name.'(.*)/', $string,$match);
    if(isset($match[1])){
        return trim($match[1]);
    }else{
        return '';
    }
}






