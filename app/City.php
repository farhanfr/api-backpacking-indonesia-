<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';
    protected $fillable = ['province_id ','name_city','photo'];
    public $timestamps = FALSE;

    public function province(){
        return $this->belongsTo('App\Province','province_id','id');
    }
}
