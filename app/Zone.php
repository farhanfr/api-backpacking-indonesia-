<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $table = 'zone';
    protected $fillable = ['name_zone '];
    public $timestamps = FALSE;
}
