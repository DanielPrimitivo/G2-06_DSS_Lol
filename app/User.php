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
        'name', 'email', 'password',
    ];

    public function champions(){
        return $this->belongsToMany('App\Champion');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public static function informacionIndividual(User $user){
        return view('user.user', compact('user'));
    }

    public static function principal(){
        $users = User::paginate(18);
        return view('user.users', compact('users'));
    }

    public static function listar(){
        $users = User::paginate(18);
        return view('user.userslist', compact('users'));
    }

    public static function eliminar(User $user){
        $champ_users = DB::table('champion_user')->where('user_id','=', $user->id)->delete();
        $user->delete();
        return redirect()->route('users.list');
    }

    /* DESHABILITADO HASTA LA INTRODUCCIÓN DE LAS PÁGINAS DE RUNAS

    public function runespages(){
        return $this->hasMany('App\RunePage');
    }*/
}
