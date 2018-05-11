<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    //
	public $fillable = ['user_id', 'message'];
}
