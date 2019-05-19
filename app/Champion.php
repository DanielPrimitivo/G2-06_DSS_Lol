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

    public function builds(){
        return $this->hasMany('App\Build');
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }

    public static function crear(array $data){
        $champion = new Champion();
        $champion->name = $data['name'];
        $champion->rol = $data['rol'];
        $champion->title = $data['title'];
        $champion->location = $data['location'];
        $champion->save();
        return redirect()->route('champions');
    }

    public static function actualizar(array $data, Champion $champion){
        $champion->update($data);
        return redirect()->route('champion.details', ['champion' => $champion]);
    }

    public static function PagCrear(){
        return view('champion.championcreate');
    }

    public static function eliminar(Champion $champion){
        //Hability::where('champion_id','=', $champion->id)->delete();
        //DB::table('champion_user')->where('champion_id','=', $champion->id)->delete();
        $champion->delete();
        return redirect()->route('champions.list');
    }

    public static function listaUserAdmin(){
        $champions = Champion::paginate(20);
        return view('champion.championslist', compact('champions'));
    }

    public static function listaUserNormal(){
        $check = "";
        $champions = Champion::paginate(12);
        return view('champion.champions', compact('champions', 'check'));
    }

    public static function informacionIndividual(Champion $champion){
        $habilities = Hability::where('champion_id', '=', $champion->id)->get();
        return view('champion.champion', compact('champion', 'habilities'));
    }

    public static function ordenarAlfabeticamente(){
        $check = "checked";
        $champions = Champion::orderBy('name', 'ASC')->paginate(12)->appends([
            'order' => $check
        ]);
        return view('champion.champions', compact('champions', 'check'));
    }

    public static function editarInfo(Champion $champion){
        return view('champion.championedit', compact('champion'));
    }
}
