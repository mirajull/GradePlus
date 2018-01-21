<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfferLink extends Model
{
    protected $table = "offerLink";
    protected $fillable = ['offer_id','link','name'];
}
