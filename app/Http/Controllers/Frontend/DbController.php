<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Frontend\Controller;
use App\Model\User;
use App\Model\Address;
use App\Model\Post;

class DbController extends Controller
{

    /**
     * Db模板测试
     * 
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    function index()
    {
        return parent::index();
    }

    /**
     * @desc hasOne
     * 
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    function demo1()
    {
        $user=User::find(1);
        dump($user->address->toArray());
        
        $address=Address::find(1);
        dump($address->user->toArray());
        
        $address=Address::find(3);
        dump($address->user->toArray());
    }
    
    /**
     * @desc hasMany
     */
    
    function demo2(){
        $user=User::with('address','post')->find(1);
       // $user=User::find(1);
        $posts=$user->post;
        foreach($posts as $post){
           dump ($post->title);
        }
        
        
        
        $post= Post::find(4);
       // dump($post->user->toArray());
    }
    
    /**
     * @desc 插入
     */
    function demo3(){
        $user = User::find(1);
        $user->post()->save(new Post(['title'=>'blog 06']));
    }
    
    /**
     * @desc create([])方法
     */
    function demo4(){
        User::find(1)->post()->create(['title'=>'blog 07']);
    }
    
    /**
     * @desc createMany();
     */
    function demo5(){
        User::find(1)->post()->createMany([
            ['title'=>'blog 08'],
            ['title'=>'blog 09'],
            ['title'=>'blog 10'],
            ['title'=>'blog 11'],
            ['title'=>'blog 12'],
        ]);
    }
    
   
}

