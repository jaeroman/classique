<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    protected $table = 'product';

    public function stocks()
    {

        return $this->hasMany(Stock::class);

        // return $this->hasMany('App\Stock', 'product_id', 'id');
        
    }

    public function productType()
    {

        return $this->belongsTo(ProductType::class);
        
    }
}
