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

//客户端凭证授权令牌
Route::get('/credentials', function(Request $request) {
    $guzzle = new GuzzleHttp\Client;
    
    $response = $guzzle->post(url('oauth/token'), [
        'form_params' => [
            'grant_type' => 'client_credentials',
            'client_id' => '1',
            'client_secret' => 'ml3KXBt88wc6Lg5GEBBUVsMPTN1zHOO8E6u83Fnk',
            'scope' => '*',
        ],
    ]);
    
    return json_decode((string) $response->getBody(), true);
})->middleware('client');

//客户端代码
Route::get('/redirect', function (){
    $query = http_build_query([
        'client_id' => '8',
        'redirect_uri' =>  'http://la56.org/auth/callback',
        'response_type' => 'code',
        'scope' => '',
    ]);
    
    return redirect(url('oauth/authorize').'?' . $query);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
