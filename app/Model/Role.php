<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table="role";
    protected $primaryKey = 'id';
    protected $guarded=[];
    public   $timestamps=false;

    //多对多
    function users(){
        //User::class :需要获取的关联模型
        //user_and_role：中间表
        //role_id:当前模型在中间表中的外键
        //user_id:中间表中关联模型的id
        return $this->belongsToMany(User::class,'user_and_role','role_id','user_id')->withPivot('brand');
    }

    function usersPivot(){
        return $this->belongsToMany(User::class,'user_and_role','role_id','user_id')
                ->withPivot('brand')
                ->wherePivot('brand','品牌2');
            ;
    }



}
