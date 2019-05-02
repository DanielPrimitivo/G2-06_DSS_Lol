<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spell extends Model
{
    public function builds(){
        return $this->belongsToMany('App\Build');
    }

    protected $fillable = array('name', 'description');

    public static function crear(array $data){
        $spell = new Spell();
        $spell->name = $data['name'];
        $spell->description = $data['description'];
        $spell->save();
        return redirect()->route('spells');
    }

    public static function actualizar(array $data, Spell $spell){
        $spell->update($data);
        return redirect()->route('spell.details', ['spell' => $spell]);
    }

    public static function PagCrear(){
        return view('spell.spellcreate');
    }

    public static function eliminar(Spell $spell){
        $spell->delete();
        return redirect()->route('spells.list');
    }

    public static function listaUserAdmin(){
        $spells = Spell::paginate(20);
        return view('spell.spellslist', compact('spells'));
    }

    public static function listaUserNormal(){
        $spells = Spell::paginate(12);
        return view('spell.spells', compact('spells'));
    }

    public static function informacionIndividual(Spell $spell){
        return view('spell.spell', compact('spell'));
    }

    public static function ordenarAlfabeticamente(){
        $spells = Spell::orderBy('name', 'ASC')->paginate(12);
        return view('spell.spells', compact('spells'));
    }

    public static function editarInfo(Spell $spell){
        return view('spell.spelledit', compact('spell'));
    }
}
