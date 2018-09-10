<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //


    //Alle countries
    public static function countries(){
        $countries = Country::all();
        $result = [];
        foreach($countries as $country){
            $result[$country->id] = $country->name;
        }
        return $result;
    }
}
