<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'province';
    protected $fillable = ['zone_id ','name_province','photo'];
    public $timestamps = FALSE;

    public function zone(){
        return $this->belongsTo('App\Zone','zone_id','id');
    }

}
