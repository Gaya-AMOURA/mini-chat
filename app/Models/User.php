<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    public $timestamps = false;

    protected $hidden = ['password'];

    protected $fillable = ['nom','prenom','login','numero','username','type'];

    public function getMDP(){
        return $this->password;
    }

    public function IsAdmin(){
        return $this->type == 'admin';
    }

    public function IsUser(){
        return $this->type == 'user';
    }

}
