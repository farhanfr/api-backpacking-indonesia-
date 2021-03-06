<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $table = 'destination';
    protected $fillable = ['city_id ','zone_id','name_destination','desc_destination','photo'];
    public $timestamps = FALSE;

    public function city(){
        return $this->belongsTo('App\City','city_id','id');
    }

    public function province(){
        return $this->belongsTo('App\Province','province_id','id');
    }
}
