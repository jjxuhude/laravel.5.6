<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $guarded=[];
    
    public   $timestamps=false;
    
    function user(){

        //`posts`.`user_id`=`users`.'id'
        return $this->belongsTo('App\Model\User','user_id','id');
    }
}
