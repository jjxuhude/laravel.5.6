<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Frontend\Controller;
use App\Model\Address;
use App\Model\Post;
use App\Model\Role;
use App\Model\User;
use App\Services\DocParser;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\App;
use function PHPSTORM_META\type;

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
     * 一对多模型(指定用戶)
     * @param int $id
     */
    function hasMany1($id=2){
        $user = User::with(['posts'=>function(HasMany $query){
            $query->where('id','>',16);
        }])->find($id);

        dump($user->posts->count());
        dump(count($user->posts));
        dump($user->toArray());
    }

    /**
     * 一对多模型(过滤有值)
     * @param int $id
     */
    function hasMany2($id=1){
        $list=User::has('posts')->with(['posts'=>function(HasMany $query){
            $query->where('title','like','%06%');
        }])->get();
        dump($list->toArray());
    }


    /**
     * 一对一反向关联
     * @param int $addressId
     * @return mixed
     */
    function belongsTo1($addressId=1){
        $address =Address::find($addressId);
        return $address->user->toArray();
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
        dump($user->roles->toArray());
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
     * 获取至少有一个帖子的用户:whereHas
     */
	function has2(){
        $users=User::whereHas('posts',function($query){
			$query->where('id','>',1);
		})->get();
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
            dump ($user->toArray());
        }
    }

	/**
     * 预加载：多对多
     */
    function with4(){
        $users = User::with('roles:id,name')->get();
        dump($users->toArray());
    }

    /**
     * 延迟预加载 :load() 设置更多的查询条件到渴求式加载查询上
     */
    function load(){
        $users = User::all();
        $users->load('address');
		dd($users->toArray());
 
    }
	
	/**
     * 延迟预加载 :load() 多对多
     */
    function load2(){
        $users = User::all()->load('roles');
		dump($users->toArray());
 
    }

    /**
     * 延迟预加载 :去掉空值
     */
    function notEmpty(){

        $users=User::has('address')->get();

        dump ($users->toArray());

    }

    /**
     * 同步数据1
     */
    function sync1(){
        $user = User::find(3);
        $data=[3,4];
        $result = $user->roles()->sync($data);
        dump($result);
    }

    /**
     * 同步数据:附件数据
     */
    function sync2(){
        $user = User::find(3);
        $data=[1=>['brand'=>'111'],2=>['brand'=>'222']];
        $result = $user->roles()->sync($data);
        dump($result);
    }


    /**
     * 添加一对多数据
     * @param string $title
     */
    function create($title="评论内容"){

        $user = User::find(3);
        $result=$user->posts()->create(
            ['title'=>$title]
        );
        dump($result);
    }

    /**
     * 添加多数据
     * @param string $title
     */
    function createMany($title="评论内容"){

        $user = User::find(3);
        $result=$user->posts()->createMany(
            [
                ['title'=>$title],
                ['title'=>$title],
                ['title'=>$title],
            ]
        );
        dump($result);
    }


    /**
     *  多对多，中间表添加数据,可能会有重复的值要设置外键，最好用sync
     * @param int $userId
     * @param int $roleId
     * @param string $brand
     */
    function attach($userId = 3,$roleId=3,$brand="CSS"){
        $user = User::find($userId);
        $result= $user->roles()->attach($roleId,['brand'=>$brand]);
        dump($result);
    }

    /**
     * 删除
     * @param int $userId
     */
    function detach($userId=3){
        $user = User::find($userId);
        $result=$user->roles()->detach();
        dump($result);
    }











}

