<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RunePage extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function runes(){
        return $this->belongsToMany('App\Rune');
    }

    public function build(){
        return $this->belongsTo('App\Build');
    }
}
