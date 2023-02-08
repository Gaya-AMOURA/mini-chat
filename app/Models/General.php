<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class General extends Model
{

    public $timestamps = true;


    protected $fillable = ['user_sent_id','message'];

}
