<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horoscope extends Model
{
    public function sign() {
        return $this->belongsTo('App\Sign');
    } 
}
