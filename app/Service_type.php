<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service_type extends Model
{
     //Table name
     protected $table = 'service_type';
     //Primary Key
     public $primaryKey = 'id';
 
     public function service(){
         return $this->hasMany('App\Service');
}
public function company(){
    return $this->hasMany('App\Company');
}
}