<?php
use App\Http\Controllers\Frontend\BladeController;
use App\Http\Controllers\Frontend\RequestController;

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


Route::get('/auth/callback', function (\Illuminate\Http\Request $request){
    if ($request->get('code')) {
        $http = new GuzzleHttp\Client;
        
        dump($request->get('code'));exit;
        $response = $http->post(url('oauth/token'), [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => '6',  // your client id
                'client_secret' => 'kAyQpjbrV2OMtlcQSUO593tLebDavHfHcxzNTc2f',   // your client secret
                'redirect_uri' => url('auth/callback'),
                'code' => $request->code,
            ],
        ]);
        
        return json_decode((string) $response->getBody(), true);
    } else {
        return 'Access Denied';
    }
}); 


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















