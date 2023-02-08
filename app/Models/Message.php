<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    public $timestamps = true;

    protected $fillable = ['user_send_id','user_receive_id','message'];

}
