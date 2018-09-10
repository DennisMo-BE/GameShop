<?php

namespace App;

use App\Http\Controllers\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable=['name'];

    //1 category kan meerdere producten bevatten
    public function products(){
        return $this->belongsToMany('App\Product');
    }
}

