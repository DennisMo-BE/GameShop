<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //
    protected $fillable = ['photo_id','title', 'body'];


    public function user(){
        return $this->belongsTo('App\User');
    }

    //1 game bavat een foto
    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    //1 game kan meerdere categorieën hebben
    public function categories(){
        return $this->belongsToMany('App\Category');
    }
    //niet gebruikt
    public function comments(){
        return $this->hasMany('App\Comment');
    }

    //
    public function scopeSearch($query, $s){
        return $query->where('title','like','%' .$s. '%')
            ->orWhere('body','like','%' .$s. '%');

    }
}
