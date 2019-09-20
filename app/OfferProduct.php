<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfferProduct extends Model
{
    public function offer()
    {
        return $this->belongsTo('App\Offer');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
