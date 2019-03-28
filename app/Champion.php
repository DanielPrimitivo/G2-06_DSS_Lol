<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Champion extends Model
{

    protected $fillable = array('name', 'rol', 'title', 'location');

    public function habilities(){
        return $this->hasMany('App\Hability');
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }
}
