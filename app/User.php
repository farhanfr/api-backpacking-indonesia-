<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    protected $fillable = ['name_user ','no_hp','email_user','username','password','photo_user','token'];
    public $timestamps = FALSE;

    protected $hidden = ['password','token','secret'];
}
