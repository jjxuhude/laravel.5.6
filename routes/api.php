<?php

use Illuminate\Http\Request;
use App\Events\OrderShipped;

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



//第三方客户端授权方式跳转控制
Route::get('/redirect/{client_id?}', 'API\OauthController@redirect')->where(['client_id'=>'[0-9]+']);
//成功后添加 header("Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImIxMGQ3Zjc5MTZmMjc3ZTAxZjUyYmM5NjAxZjQ3NGIyMjg0MjYzOTFhNjZhYTA0N2FjYzY3MGQ1ZDJlOGY1ODdhMDJlYmUxMmY3ZGEwMzBhIn0.eyJhdWQiOiI1IiwianRpIjoiYjEwZDdmNzkxNmYyNzdlMDFmNTJiYzk2MDFmNDc0YjIyODQyNjM5MWE2NmFhMDQ3YWNjNjcwZDVkMmU4ZjU4N2EwMmViZTEyZjdkYTAzMGEiLCJpYXQiOjE1MjYzNTM4MzEsIm5iZiI6MTUyNjM1MzgzMSwiZXhwIjoxNTI5MDMyMjMxLCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.PJU3Go9ULcTYWQioxZijQ0lNDjyqkTrfGh-C0M4SOou-i2_RKbCzWWbrrcKQ28wnx5zsPvRcB3kzNK28iIZz8cpGvgHEK3fzHALmvVjv2MYjdbBJc36zapAvKzVL_4KC0gXsK9X6X0eL2AtpQTD3fJeK8ZAp_5ueg1H5R2OpQ0UaZhwIbEm0dF4RV2Hqma4gNItPtEM-rqKgvb5qDNgqo-grbgyxprFITAL9WfxNjc-caGGnlwMFyTbX6kIHpF2-haQZQJnZZ8lHk0fP8w7-Iqfs5Vfsdqik0FJZdKekFH6tfZNYDYOMhsmC0EdtkO1MUYTmCyPKHdOQ6saZL6dJz47YIWVkEwOAlkCY_E4nzJ2LHUk1hmNZUqHRFks40tnbh-DwCZhNY85VgF5brg3UBDPfc4iiaxazqhxvviLwH8tEfxrcmjL78518Jr96C2-JNLEK9f4cKIY7ZXo44MdHtowkKvJJOx4h2zUmxq84dEGnB30_V7DcnUmNxfcpDsA2LyoKlgj03HHUfVni9Q7DOdysTytnMPMKQ6MNla0NSHc3KXp7Huqitl_WjXR4kwZxviWxNlyxmMriovn7C54w3_ZnFZXj9f8iADby2K04V8q-mDSV9YeXhmBO3lVR6jbJbyOo7vytwDshbFyIpyx5fCckF_vwiqY--4Pc_axDOts");
Route::get('/callback', 'API\OauthController@callback'); 

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
