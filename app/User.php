<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'surname', 'phone', 'picture'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function favorites(){
        return $this->hasMany('App\Favorites');
    }
    public function coments(){
        return $this->hasMany('App\Coments');
    }
    public function blog(){
        return $this->hasMany('App\Blog');
    }
    public function role(){
        return $this->belongsTo('App\Role');
    }
    // Pārbauda, vai lietotājs ir admininstrators
    public function isAdmin(){
        return ($this->role_id == 1);
    }
}
