<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
       //Table name
       protected $table = 'service';
       //Primary Key
       public $primaryKey = 'id';
       //Timestamps
       public $timestamps = true;
   
       public function user_service(){
        return $this->hasMany('App\User_service');
       }

       public function coments(){
        return $this->hasMany('App\Coments');
}
public function service_type(){
    return $this->belongsTo('App\Service_type');
   }
}