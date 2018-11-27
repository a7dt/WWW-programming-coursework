<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookinstance_Order extends Model
{
    public function bookinstances() {
        return $this->belongsTo('App\Bookinstance');
    }

    public function order() {
        return $this->belongsTo('App\Order');
    }
}
