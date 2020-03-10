<?php
use App\Http\Controllers\Frontend\BladeController;
use App\Http\Controllers\Frontend\RequestController;
use App\Http\Controllers\Frontend\DbController;

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */

Route::get('mail/send','MailController@send');




// 前台
Route::group([
    'namespace' => 'Frontend'
], function () {
    Route::get('/', function () {
        return view('frontend.welcome');
    });
    Route::get('/home', 'HomeController@index')->name('home');
    Auth::routes();
    
    $routeConfig = resolve('routeConfig');
    $routeConfig->setController(BladeController::class);
    $routeConfig->setController(RequestController::class);
    $routeConfig->setController(DbController::class);
    $routeConfig->setController(\App\Http\Controllers\Frontend\RelatedController::class);
    Route::get('demo', 'DemoController@index');
});

// 后台
Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function () {
    Route::get('/', 'Home\IndexController@index');

    Route::get('login', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout');
    Route::get('register', 'Auth\RegisterController@showRegistrationForm');
    Route::post('register', 'Auth\RegisterController@register');
});
















Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
