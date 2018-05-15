<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

/**
 * 
 * @author Jack.Xu1
 * @desc 
 * 1.composer require laravel/passport
 * 2.php artisan migrate
 * 3.php artisan passport:install
 * 4.你需要在 app/Providers/AuthServiceProvider.php 的 boot 方法中调用 Passport::routes 方法
 * 5.config/auth.php 中，需要设置 api 认证 guard 的 driver 选项为 passport
 * 6.生成前端vue组件：php artisan vendor:publish --tag=passport-components
 * Vue.component(
        'passport-clients',
        require('./components/passport/Clients.vue')
    );
    
    Vue.component(
        'passport-authorized-clients',
        require('./components/passport/AuthorizedClients.vue')
    );
    
    Vue.component(
        'passport-personal-access-tokens',
        require('./components/passport/PersonalAccessTokens.vue')
    );
    npm run dev
    <passport-clients></passport-clients>
    <passport-authorized-clients></passport-authorized-clients>
    <passport-personal-access-tokens></passport-personal-access-tokens>
    7.部署 Passport： php artisan passport:keys
    8.创建客户端：php artisan passport:client
 *
 */
class OauthController extends Controller
{

    const CLIENT_ID = 5;

    const CLIENT_SECRET = '7FU6Qs2BpClruEclLaa7MGZS2Tjf5p5FxN54Rfrj';

    const REDIRECT_URI = 'http://la.org/api/callback';

    const ACCESS_TOKEN = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjVjMDBmN2ExZTgyOTJmMmU5YjYxYTQ4M2M0ZDljNjhiZmVjMGRiMDgwMWQxZDM0ZTU2MjU2Mjg1ZDQ5OGUxMGZhOGQ5NTBjZGY4ZDI1ZmM2In0.eyJhdWQiOiI1IiwianRpIjoiNWMwMGY3YTFlODI5MmYyZTliNjFhNDgzYzRkOWM2OGJmZWMwZGIwODAxZDFkMzRlNTYyNTYyODVkNDk4ZTEwZmE4ZDk1MGNkZjhkMjVmYzYiLCJpYXQiOjE1MjYzNTY1NzcsIm5iZiI6MTUyNjM1NjU3NywiZXhwIjoxNTI5MDM0OTc3LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.e9nYCxssMFqs05T1XZdJ5-1A9jL5fI5fSJRApFabB5mS1R7p4rdEhLwMVlo-WwNmizrasB9T37SMNswvcMPWGEz9WOfxogVqc-JOPygOrxPzQvep3CySsIFmbCw7OQINV0wPm4dM0TY9ulwZMUNmFXy1CMQoo6uuQizyb3l1QOsrq0KkgonSgUfL1XrvM0mQieOzJX-k7rViYhn2Hz3ZnssuclWrbwJuCVfCJPFhMgr3hwT-EDQUYfuz0M-gnPzXz9NCq7Dt1nIToT-lh-YyD0kkNBpyMFYPXju3ywgGz2tuj4yCajT6QwkO4IYZ2ZNkz3GWSiTBCVtHrT53LzWpo87Rxnxth3okXW11k_KP75M9lqxzEN9H4h6x_ywfJpZRyO-ZQM_gaCk6-4eltcA9pqCzcwFGPKAM1rSWOcwpFnN76oSNFKUOa8LdDh1ZsMXmt_HCk-qdNanPCUU49iBKLzHcT_xHp2kDvGw-RYXm5y8h1lu6WDC0HGKLOe7DLB52kKztyFpFag_cdFKjyA8ss7ylrvSuVVLmc1u39-usB124hF0iK5B3C9CZJgwvspvwnGyu_CYDM4porwlijSXv4iU2gemPWzVHoVQEBCAIMHR03mMVD6AGlRmPO7s2nGvghWBXsdqjZBujx5fGVldThtE_cnHlLV8H_z5FrUl1veo';

    const REFRESH_TOKEN = 'def50200e09444fe04a11767f71e5436ebce1bbfc77acadd7d87c731dd4bcc36c3d0745b135b7d422dd16eb700cbbf5d306292a20db19fe52e1fb3d5de85b297ed9dd4d42288a9c7ae62d62a9d79de066fdca0106414f0b318d3cab78fba70cb265523514f628cf5629e00e2b35c1675fc316e5060ebbad634b15964ae92d6f430fa6e438f14e8da32c8a17fb1c32b45559ec9c64a31fbe8487340f86c678a299f0be536cf43a524ab912d7f7f36a137c263671bad9bade2e1c122b18401dfd37e1d7dd302bb373e1f2e9a18c621ec72af6c1273d33358febcf742a066f2602be82896623e3d2fbf3522c1d243028ce75f30a546cf40ea79bafe5b98e1eb2462c8e54ffbcbd2f1f014eab22e398e6c3060a5045fce7a4b1213bc8af82320df2f0887679c5b7beeb631db836ef539d49aab4cc40f6290696d0760ad643a32fe6877e8141e631793a39fcff5a3cfb59310bdc4646f8a46844cf4966ec8bcddbe5d8a';

    const PASSWORD_CLIENT_ID = 6;

    const PASSWORD_CLIENT_SECRET = "vgj6JlhQKg13mAy8TvndH7uGiQt6jdXv2yKG6oBA";

    const USERNAME = "user01@163.com";

    const PASSWORD = "111111";

    /**
     * passport验证控制器
     *
     * {@inheritdoc}
     *
     * @see \App\Http\Controllers\API\Controller::index()
     */
    public function index()
    {
        return parent::index();
    }

    /**
     * @desc php artisan passport:client 生成客户端
     *
     * @method get
     * @param number $client_id            
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function redirect($client_id = 5)
    {
        $query = http_build_query([
            'client_id' => $client_id,
            'redirect_uri' => 'http://la.org/api/callback',
            'response_type' => 'code',
            'scope' => ''
        ]);
        
        return redirect(url('oauth/authorize') . '?' . $query);
    }

    /**
     * @desc 获取服务器授权token
     * http://la.org/api/callback?refresh_token
     * http://la.org/api/callback?password
     * 
     * @param \Illuminate\Http\Request $request            
     * @return string|mixed
     */
    public function callback(\Illuminate\Http\Request $request)
    {
        // 密码token
        if ($request->has('password')) {
            return $this->passwordToken();
        }        
        // 刷新token
        elseif ($request->has('refresh_token')) {
            return $this->refreshToken();
        }        
        // 获取token
        elseif ($request->get('code')) {
            return $this->getTokenByCode($request);
        } 
        //客户端凭证授权令牌
        elseif($request->has('credentials')){
            return $this->credentialsToken();
        }else {
            return 'Access Denied';
        }
    }

    /**
     * @desc 通过code获取token
     *
     * @param unknown $request            
     * @return mixed
     */
    private function getTokenByCode($request)
    {
        $http = new \GuzzleHttp\Client();
        $response = $http->post(url('oauth/token'), [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => self::CLIENT_ID, // your client id
                'client_secret' => self::CLIENT_SECRET, // your client secret
                'redirect_uri' => self::REDIRECT_URI,
                'code' => $request->code
            ]
        ]);
        
        return json_decode((string) $response->getBody(), true);
    }

    /**
     * 刷新token
     *
     * @return mixed
     */
    private function refreshToken()
    {
        $http = new \GuzzleHttp\Client();
        $response = $http->post(url('oauth/token'), [
            'form_params' => [
                'grant_type' => 'refresh_token',
                'refresh_token' => self::REFRESH_TOKEN,
                'client_id' => self::CLIENT_ID,
                'client_secret' => self::CLIENT_SECRET,
                'scope' => ''
            ]
        ]);
        
        return json_decode((string) $response->getBody(), true);
    }

    /**
     * 密码token
     * php artisan passport:client --password
     * 
     * @return mixed
     */
    private function passwordToken()
    {
        $http = new \GuzzleHttp\Client();
        
        $response = $http->post(url('oauth/token'), [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => self::PASSWORD_CLIENT_ID,
                'client_secret' => self::PASSWORD_CLIENT_SECRET,
                'username' => self::USERNAME,
                'password' => self::PASSWORD,
                'scope' => ''
            ]
        ]);
        
        $data = json_decode((string) $response->getBody(), true);
        
        $data['grant_type'] = 'password';
        
        return $data;
    }

    /**
     * @desc 客户端凭证授权令牌
     * @return mixed
     */
    private function credentialsToken()
    {
        $guzzle = new \GuzzleHttp\Client();
        
        $response = $guzzle->post(url('oauth/token'), [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => self::CLIENT_ID,
                'client_secret' => self::CLIENT_SECRET,
                'scope' => '*'
            ]
        ]);
        
        return json_decode((string) $response->getBody(), true);
    }
}
