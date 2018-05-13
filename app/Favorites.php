<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    protected $table = 'favorites';
    //Primary Key
    public $primaryKey = 'id';

    public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function service(){
        return $this->belongsTo('App\Service');
    }
}
