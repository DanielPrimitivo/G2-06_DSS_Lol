<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type'
    ];

    public function champions(){
        return $this->belongsToMany('App\Champion');
    }

    public function builds(){
        return $this->belongsToMany('App\Build');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public static function informacionIndividual(Int $id){
        $usu = User::find($id);
        return view('user.user', compact('usu'));
    }

    public static function principal(){
        $users = User::paginate(18);
        return view('user.users', compact('users'));
    }

    public static function listar(){
        $users = User::paginate(18);
        return view('user.userslist', compact('users'));
    }

    public static function eliminar(Int $id){
        $champ_users = DB::table('champion_user')->where('user_id','=', $id)->delete();
        $us = User::find($id);
        $us->delete();
        return redirect()->route('users.list');
    }

    /* DESHABILITADO HASTA LA INTRODUCCIÓN DE LAS PÁGINAS DE RUNAS

    public function runespages(){
        return $this->hasMany('App\RunePage');
    }*/
}
