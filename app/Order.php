<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'city', 'country_id', 'postal_code', 'address', 'subtotal', 'delivery_address', 'total', 'payment_method',  'payment_id', 'status', 'user_id'
    ];

    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */

    //een order behoort to een user
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function country()
    {
        return $this->belongsTo('App\Country');
    }
    //een order bevat meerdere producten
    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('price', 'amount');//extra attributen van een order
    }



}
