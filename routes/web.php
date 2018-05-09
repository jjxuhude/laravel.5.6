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


//服务器验证代码
Route::get('/auth/callback', function (\Illuminate\Http\Request $request){
    
    //刷新token
    if($request->has('refresh_token')){
        $http = new GuzzleHttp\Client;
        
        $response = $http->post(url('oauth/token'), [
            'form_params' => [
                'grant_type' => 'refresh_token',
                'refresh_token' => 'def5020097bcd529fe52538db1224986e0dec40070eb969956679c392e63a3ac474dbab2139bbcf3bf6ebd79ce63bf2f488cafacebed563dd7d1d0f3731d1da66c96a0d099165ac5b2eaad6024dd394a5ebc597cfa7a03b6e5ede48ff797f694082d652c133855d0d02ac9256f9cbf28b0e43fdb68bba5d29aecb8ee61e53e7bc1729a8dd30e7518e007170ffd819704be19d12939206c4f68ebbfbda2052ff2f7baeb8185301060337c03f1e85d57f4cad08b15c2b04a512109bfacd933529154ce7d5f21aadca0edfa0927ceb0c595054023d324368d6a8b78a70dec50923c279f1266da6c245797297925d24128a6ad5857138e26f7b03150489df8c76d0709a4be0eb9d4b7ae15d2ba198c9dba99479ecf0aef684462771b1e8200c8ff7da05dcb781f72f48da46a978d09101116df6dd024cc5535d24c31d843e96768cf880d08c300e4da64069fef9efe2dee28a827cef5328b87d7c9f6c670b21fd68517',
                'client_id' => '8',
                'client_secret' => 'sTde5bAURAdhw3FEthBTjq2llrs0iLR4uVvepg53',
                'scope' => '',
            ],
        ]);
        
        return json_decode((string) $response->getBody(), true);
    }
    
    //获取token
    if ($request->get('code')) {
        $http = new GuzzleHttp\Client;
        
        $response = $http->post(url('oauth/token'), [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => '8',  // your client id
                'client_secret' => 'sTde5bAURAdhw3FEthBTjq2llrs0iLR4uVvepg53',   // your client secret
                'redirect_uri' => 'http://la56.org/auth/callback',
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















