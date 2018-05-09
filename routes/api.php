<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('index', 'API\PassportController@index');
Route::post('login', 'API\PassportController@login');
Route::post('register', 'API\PassportController@register');
Route::get('getDetails', 'API\PassportController@getDetails');

Route::get('/redirect', function (){
    $query = http_build_query([
        'client_id' => '7',
        'redirect_uri' =>  url('auth/callback'),
        'response_type' => 'code',
        'scope' => '',
    ]);
    
    return redirect(url('oauth/authorize').'?' . $query);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
