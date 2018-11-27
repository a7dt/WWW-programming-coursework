<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function bookinstance_orders() {
        return $this->hasOne('App\Bookinstance_Order');
    }
}
