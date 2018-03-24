<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_service extends Model
{
    //Table name
    protected $table = 'user_service';
    //Primary Key
    public $primaryKey = 'id';

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function service(){
        return $this->belongsTo('App\Service');
    }
}
