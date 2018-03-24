<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
     //Table name
     protected $table = 'company';
     //Primary Key
     public $primaryKey = 'id';
 
     public function service(){
         return $this->hasMany('App\Service');
}
public function role(){
    return $this->belongsTo('App\Role');
}
public function service_type(){
    return $this->belongsTo('App\Service_type');
}
}