<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'address', 'city','postal_code', 'phone', 'email', 'password','country_id','role_id','photo_id','is_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //1 user heeft 1 role
    public function role(){
        return $this->belongsTo('App\Role');
    }
    //1 user heeft 1 foto
    public function photo(){
        return $this->belongsTo('App\Photo');
    }
    //kijken als de persson admin is kijkt in de role table naarm administrator
    public function isAdmin(){
        if($this->role->name == 'administrator' && $this->is_active == 1 ){
            return true;
        }
        return false;

    }

    //een user behoort tot een land
    public function country(){
        return $this->belongsTo('App\Country');
    }

    //een user kan meerdere orders hebben
    public function orders(){
        return $this->hasMany('App\Order')->orderBy('created_at', 'desc');
    }




}
