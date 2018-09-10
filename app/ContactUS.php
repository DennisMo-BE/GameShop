<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUS extends Model
{

    public $table = 'contactus';
    //velden om in te vullen
    public $fillable = ['name','email','message'];

}