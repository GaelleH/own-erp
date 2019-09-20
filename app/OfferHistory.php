<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfferHistory extends Model
{
    public function offer()
    {
        return $this->belongsTo('App\Offer');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
