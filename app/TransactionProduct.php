<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionProduct extends Model
{
    protected $table = 'transactions_product';

    protected $guarded = [];

    public function transactions()
    {

         return $this->belongsTo('App\Transaction', 'transaction_id', 'id');
        
    }

    public function product()
    {

        return $this->belongsTo('App\Product', 'productName', 'id');
        
    }
    
}
