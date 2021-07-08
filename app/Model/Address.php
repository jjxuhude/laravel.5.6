<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $guarded=[];
    
    function user(){
        //1.模型名称（user表）
        //2.外键(address表的user_id)
        //3.主键(user表的id)
        //address.user_id = App\Model\User.id
        return $this->belongsTo('App\Model\User','user_id','id')->withDefault();
    }
    
}
