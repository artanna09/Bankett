<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //Table name
    protected $table = 'service';
    //Primary Key
    public $primaryKey = 'id';

    public $timestamps = false;

    public function favorites()
    {
        return $this->hasMany('App\Favorites');
    }
    public function coments()
    {
        return $this->hasMany('App\Coments');
    }
    public function service_type()
    {
        return $this->belongsTo('App\Service_type');
    }
}
