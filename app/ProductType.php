<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = 'product_type';

    public function product()
    {
        return $this->hasOne(Product::class);

  //      return $this->belongsTo('App\User', 'foreign_key', 'other_key');
    }
}
