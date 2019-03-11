<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rune extends Model
{
    public function runePages(){
        return $this->belongsToMany('App\RunePage');
    }
}
