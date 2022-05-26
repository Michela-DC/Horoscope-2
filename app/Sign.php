<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sign extends Model
{
    public function category() {
        return $this->belongsTo('App\Upload');
    }
}
