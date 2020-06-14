<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentDestination extends Model
{
    protected $table = 'destination_comment';
    protected $fillable = ['city_id ','destination_id','user_id','comment','comment_date'];
    public $timestamps = FALSE;

    public function city(){
        return $this->belongsTo('App\City','city_id','id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function destination(){
        return $this->belongsTo('App\Destination','destination_id','id');
    }
}
