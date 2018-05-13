<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedbacks extends Model
{
    //Table name
    protected $table = 'feedbacks';
    //Primary Key
    public $primaryKey = 'id';


    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function service(){
        return $this->belongsTo('App\Service');
    }
}
