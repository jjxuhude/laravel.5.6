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

//客户端凭证授权令牌
Route::get('/credentials', function(Request $request) {
    $guzzle = new GuzzleHttp\Client;
    
    $response = $guzzle->post(url('oauth/token'), [
        'form_params' => [
            'grant_type' => 'client_credentials',
            'client_id' => '1',
            'client_secret' => 'ml3KXBt88wc6Lg5GEBBUVsMPTN1zHOO8E6u83Fnk',
            'scope' => '',
        ],
    ]);
    
    return json_decode((string) $response->getBody(), true);
})->middleware('client');

//服务器验证代码
Route::get('/auth/callback', function (\Illuminate\Http\Request $request){
    
    
    //密码token
    if($request->has('password')){
        $http = new GuzzleHttp\Client;
        
        $response = $http->post(url('oauth/token'), [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => '2',
                'client_secret' => 'De2k1WGgpKKDSJvqIE6ftfDfQarIP4wuelifebEV',
                'username' => 'api@163.com',
                'password' => '111111',
                'scope' => '',
            ],
        ]);
        
        $data=json_decode((string) $response->getBody(), true);
        
        $data['grant_type']='password';
        
        return $data;
        
    }
    
    
    
    //刷新token
    if($request->has('refresh_token')){
        $http = new GuzzleHttp\Client;
        
        $response = $http->post(url('oauth/token'), [
            'form_params' => [
                'grant_type' => 'refresh_token',
                'refresh_token' => 'def50200f71d406a6c623c2e75223182f808304b3ba0208b271d6ee818c013ec8b540197ea7a6d713abc81f35123dcf90efa9e42dab9311b4a870d3a661edfe2bb89b5717f0e2150dfaee5972c8b2e70f0d86e00925cd05c2a1a577ce8214d9ec1c01e5f760736e9821ab70f0345ad597b804b26a2be3179586cc67a91a25b56676592fd489a283cb1cc08a89e3b9c0b4273403de11a70d706214549b375f94e7848cf1ecc57ea881b58ba1ab584ba0d2b9def1bafa5ebd947a9eafcd26a46157865b115ae67430629a518608eca9d80143f5796d1b00ca7b644ad19099f4773d461616c043609e5a2b6ec97e3ae7367ce56b5d3d4b6cf11d589736c72b92627e45996b427c47f8c1ce4d96fa38eacc0707cd05c56174f1b7acfc9f2d269d517925ad476d890306da193d15b20f2b05937099a15e894e61de12d3891291ad4717eb1c27dadf105c383c874fae179ccd3faeebb1a73b9c4219a955cc823eb9c616a',
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















