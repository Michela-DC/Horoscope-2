<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    public function signs() {
        return $this->belongsToMany('App\Sign');
    }
}
