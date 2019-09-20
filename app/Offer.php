<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function offerCommunications()
    {
        return $this->hasMany('App\OfferCommunication');
    }

    public function offerHistories()
    {
        return $this->hasMany('App\OfferHistory');
    }

    public function offerProducts()
    {
        return $this->hasMany('App\OfferProduct');
    }

}
