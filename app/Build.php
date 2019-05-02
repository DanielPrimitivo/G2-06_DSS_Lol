<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Build extends Model
{
    public function champions(){
        return $this->hasMany('App\Champion');
    }

    public function runesPage(){
        return $this->hasMany('App\RunePage');
    }

    public function objects(){
        return $this->belongsToMany('App\Object');
    }

    public function spells(){
        return $this->belongsToMany('App\Spell');
    }

    protected $fillable = array('object_name', 'champion_name', 'page_rune_id', 'spell_name');

    public static function crear(array $data){
        $build = new Build();
        $build->object_name = $data['object_name'];
        $build->champion_name = $data['champion_name'];
        $build->page_rune_id = $data['page_rune_id'];
        $build->spell_name = $data['spell_name'];
        $build->save();
        return redirect()->route('builds');
    }

    public static function actualizar(array $data, Build $build){
        $build->update($data);
        return redirect()->route('build.details', ['build' => $build]);
    }

    public static function PagCrear(){
        $champions = Champion::All();
        $page_runes = runePages::All();
        $spells = Spells::All();
        $objects = Objects::All();
        return view('build.buildcreate', compact($champions, $page_runes, $spells, $objects));
    }

    public static function eliminar(Build $build){
        $build->delete();
        return redirect()->route('builds.list');
    }

    public static function listaUserAdmin(){
        $builds = Build::paginate(20);
        return view('build.buildslist', compact('builds'));
    }

    public static function listaUserNormal(){
        $builds = Build::paginate(12);
        return view('build.builds', compact('builds'));
    }

    public static function informacionIndividual(Build $build){
        return view('build.build', compact('build'));
    }

    public static function ordenarAlfabeticamente(){
        $builds = Build::orderBy('name', 'ASC')->paginate(12);
        return view('build.builds', compact('builds'));
    }

    public static function editarInfo(Build $build){
        return view('build.buildedit', compact('build'));
    }
}
