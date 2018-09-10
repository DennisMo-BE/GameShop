<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Http\Requests;

class Product extends Model
{
    //
    protected $fillable = ['photo_id','price','title', 'body', 'quantity'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    //1 product heeft een foto
    public function photo(){
        return $this->belongsTo('App\Photo');
    }
    //1 product heeft meerdere categorieën
    public function categories(){
        return $this->belongsToMany('App\Category');
    }
    //niet gebruikt
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    //een product kan behoren tot meerdere orders
    public function orders(){
        return $this->hasMany('App\Order');
    }



    public function scopeSearch($query, $s){
        return $query->where('title','like','%' .$s. '%')
            ->orWhere('body','like','%' .$s. '%');
    }

}
