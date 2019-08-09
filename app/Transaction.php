<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    public function users()
    {

         return $this->belongsTo('App\User', 'user_id', 'id');
        
    }

    public function products()
    {

        return $this->hasMany(TransactionProduct::class);

    }
}
