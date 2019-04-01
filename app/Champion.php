<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Champion extends Model
{

    protected $fillable = array('name', 'rol', 'title', 'location');

    public function habilities(){
        return $this->hasMany('App\Hability');
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }

    public static function create(array $data){
        $champion = new Champion();
        $champion->name = $data['name'];
        $champion->rol = $data['rol'];
        $champion->title = $data['title'];
        $champion->location = $data['location'];
        $champion->save();
        return redirect()->route('champions');
    }

    public static function upgrade(array $data, Champion $champion){
        $champion->update($data);
        return redirect()->route('champion.details', ['champion' => $champion]);
    }

    public static function crear(){
        return view('championcreate');
    }

    public static function eliminar(Champion $champion){
        $habilities = Hability::where('champion_id','=', $champion->id)->delete();
        $champ_users = DB::table('champion_user')->where('champion_id','=', $champion->id)->delete();
        $champion->delete();
        return redirect()->route('champions.list');
    }

    public static function listar(){
        $champions = Champion::paginate(20);
        return view('championslist', compact('champions'));
    }

    public static function principal(){
        $champions = Champion::paginate(12);
        return view('champions', compact('champions'));
    }

    public static function informacionIndividual(Champion $champion){
        return view('champion', compact('champion'));
    }

    public static function ordenarAlfabeticamente(){
        $champions = Champion::orderBy('name', 'ASC')->paginate(12);
        return view('champions', compact('champions'));
    }

    public static function editarInfo(Champion $champion){
        return view('championedit', compact('champion'));
    }
}
