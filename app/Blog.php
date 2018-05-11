<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //Table name
    protected $table = 'blog';
    //Primary Key
    public $primaryKey = 'id';

    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
