<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionProduct extends Model
{
    protected $table = 'transactions_product';

    public function transactions()
    {

         return $this->belongsTo('App\Transaction', 'transaction_id', 'id');
        
    }
    
}
