<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sign extends Model
{
    public function uploads() {
        return $this->belongsToMany('App\Upload');
    }
}
