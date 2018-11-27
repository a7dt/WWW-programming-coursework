<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookinstance extends Model
{
    public function bookinstance_order() {
        return $this->hasOne('App\Bookinstance_Order');
    }

    public function book() {
        return $this->belongsTo('App\Book');
    }
}
