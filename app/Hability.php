<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hability extends Model
{
    public function champion(){
        return $this->belongsTo('App\Champion');
    }

    
}
