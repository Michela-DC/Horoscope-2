<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    // public function signs() {
    //     return $this->belongsToMany('App\Sign');
    // }

    public function signs() {
        return $this->belongsTo('App\Sign');
    }
}
