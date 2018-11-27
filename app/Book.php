<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function bookinstances() {
        return $this->hasMany('App\Bookinstance');
    }
}
