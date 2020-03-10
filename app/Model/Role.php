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
    
    function users(){
        return $this->belongsToMany(User::class,'user_and_role','role_id','user_id')->withPivot('brand');
    }

    function usersPivot(){
        return $this->belongsToMany(User::class,'user_and_role','role_id','user_id')
                ->withPivot('brand')
                ->wherePivot('brand','品牌2');
            ;
    }



}
