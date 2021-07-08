<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function  address(){
       //App\Model\Address.user_id=user.id
       //1.关联表名称
       //2.关联表里面的外键(外键不在自己的表里面)
       //3.主表的主键(user表的主键)
       return  $this->hasOne('App\Model\Address','user_id','id');
    }
    
    public function posts(){
        //App\Model\Post.user_id=user.id
        return $this->hasMany('App\Model\Post','user_id','id');
            //->where('title','post 01');;
    }

    //多对多
    public function roles(){
        //中间表：  `user_and_role`.`user_id`=$userId  `user_and_role`.`role_id`= role`.`id`
        //Role::class :需要获取的关联模型
        //user_and_role：中间表
        //user_id:当前模型在中间表中的外键
        //role_id:中间表中关联模型的id
        return $this->belongsToMany(Role::class,'user_and_role','user_id','role_id');
    }
    
    
}
