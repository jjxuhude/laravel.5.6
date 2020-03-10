<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Frontend\Controller;
use App\Model\Address;
use App\Model\Post;
use App\Model\Role;
use App\Model\User;
use App\Services\DocParser;
use Illuminate\Support\Facades\App;

class RelatedController extends Controller
{

    /**
     * 关联模型
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    function index()
    {
        return parent::index();
    }

    /**
     * 一对一模型
     * @method POST
     * @param int $id
     * @return mixed
     */
    function hasOne($id=1){
        $user =User::find($id);
        return $user->address->toArray();
    }


    /**
     * 一对一反向关联
     * @param int $addressId
     * @return mixed
     */
    function belongsTo1($addressId=1){
        $address =Address::find($addressId);
        dd($address->user()->toSql());
        return $address->user->toArray();
    }


    /**
     * 一对多模型
     * @method GET
     * @param int $id
     *
     */
    function hasMany($id=1)
    {
        $user =User::find($id);
        return $user->posts->toArray();
    }

    /**
     * 一对多反向关联:通过帖子找用户
     * @param int $postId
     * @return mixed
     */
    function belongsTo2($postId=1){
        $post =Post::find($postId);
        //dump($post->user()->toSql());
        return $post->user->toArray();
    }

    /**
     * 多对多 通过用户找角色
     * @param int $userId
     */
    function belongsToMany1($userId=1){
        $user = User::find($userId);
        return $user->roles->toArray();
    }

    /**
     * 多对多 通过角色找用户
     * @param int $roleid
     */
    function belongsToMany2($roleid=1){
        $role = Role::find($roleid);
       // dump($role->users()->toSql());
        return $role->users->toArray();
    }


    /**
     * 多对多 通过角色找用户:wherePivot
     * @param int $roleid
     */
    function belongsToMany3($roleid=1){
        $role = Role::find($roleid);
         //dump($role->users()->toSql());
        return $role->usersPivot->toArray();
    }

    /**
     * 获取至少有一个帖子的用户:has的用法
     */
    function has1(){
        $users=User::has('posts')->get();
        return ($users->toArray());
    }

    /**
     * 关联数据计数:统计每个用户的帖子
     */
    function count1(){
        $posts = User::withCount('posts')->get();
        return $posts->toArray();
    }

    /**
     * 懒加载：耗时
     */
    function with(){
        $users = User::all();
        foreach ($users as $user) {
            dump ($user->address->city??"");
        }
    }

    /**
     * 预加载：效率高
     */
    function with1(){
        $users = User::with('address')->get();
        foreach ($users as $user) {
            dump ($user->address->city??"");
        }
    }

    /**
     * 预加载：添加条件
     */
    function with2(){
        $users = User::with(['address'=>function($query){
            $query->where('tel', 'like', '133%');
        }])->get();
        foreach ($users as $user) {
            dump ($user->address->city??"");
        }
    }

    /**
     * 预加载：添加条件，排除空记录
     */
    function with3(){
        $users = User::has('address')->with(['address'=>function($query){
            $query->where('tel', 'like', '133%');
        }])->get();
        foreach ($users as $user) {
            dump ($user->address?$user->address->toArray():"");
        }
    }


    /**
     * 延迟预加载 :load()
     */
    function load(){
        $users = User::all();
        $users->load('address');
        foreach ($users as $user) {
            dump ($user->address?$user->address->toArray():"");
        }
    }

    /**
     * 延迟预加载 :去掉空值
     */
    function notEmpty(){
        $users = User::all();
        $users=$users->load('address')->filter(function ($value, $key){
            return $value->address;
        });

        dump ($users->toArray());
    }










}

