<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
     //Table name
     protected $table = 'role';
     //Primary Key
     public $primaryKey = 'id';
 
     public function company(){
         return $this->hasMany('App\Company');
     }
    public function user(){
            return $this->hasMany('App\User');
}
}