<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $table = 'destination';
    protected $fillable = ['city_id ','name_destination','photo'];
    public $timestamps = FALSE;

    public function city(){
        return $this->belongsTo('App\City','city_id','id');
    }
}
