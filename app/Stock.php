<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $guarded = [];

    protected $table = 'stock';

    protected $dates = ['expirationDate', 'dateArrived'];

    public function products()
    {

        return $this->belongsTo('App\Product', 'product_id', 'id');
    }
}
