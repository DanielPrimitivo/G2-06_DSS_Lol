<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rune extends Model
{
    public function runePages(){
        return $this->belongsToMany('App\RunePage');
    }

    protected $fillable = array('name', 'type', 'row');

    public static function crear(array $data){
        $rune = new Rune();
        $rune->name = $data['name'];
        $rune->type = $data['type'];
        $rune->row = $data['row'];
        $rune->save();
        return redirect()->route('runes');
    }

    public static function actualizar(array $data, Rune $rune){
        $rune->update($data);
        return redirect()->route('rune.details', ['rune' => $rune]);
    }

    public static function PagCrear(){
        return view('rune.runecreate');
    }

    public static function eliminar(Rune $rune){
        $rune->delete();
        return redirect()->route('runes.list');
    }

    public static function listaUserAdmin(){
        $runes = Rune::paginate(20);
        return view('rune.runeslist', compact('runes'));
    }

    public static function listaUserNormal(){
        $runes = Rune::paginate(12);
        return view('rune.runes', compact('runes'));
    }

    public static function informacionIndividual(Rune $rune){
        return view('rune.rune', compact('rune'));
    }

    public static function ordenarAlfabeticamente(){
        $runes = Rune::orderBy('name', 'ASC')->paginate(12);
        return view('rune.runes', compact('runes'));
    }

    public static function editarInfo(Rune $rune){
        return view('rune.runeedit', compact('rune'));
    }

    public static function runesType(String $type){
        return Rune::where('type', '=', $type)->get();
    }
}
