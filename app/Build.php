<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Auth;

class Build extends Model
{
    public function champion(){
        return $this->belongsTo('App\Champion');
    }

    public function runePage(){
        return $this->belongsTo('App\RunePage');
    }

    public function objects(){
        return $this->belongsToMany('App\Object');
    }

    public function spells(){
        return $this->belongsToMany('App\Spell');
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }

    protected $fillable = array('name', 'champion_id', 'page_rune_id');

    public static function crear(array $data){
        
        $build = new Build();
        $build->name = $data['name'];
        $build->champion_id = $data['champion_id'];
        $build->page_rune_id = $data['page_rune_id'];
        //dd($build);
        $build->save();
        
        $build_id = Build::all()->last()->id;
        DB::table('build_object')->insert([
            'object_id' => $data['object_id1'],
            'build_id' => $build_id]);
        DB::table('build_object')->insert([
            'object_id' => $data['object_id2'],
            'build_id' => $build_id]);
        DB::table('build_object')->insert([
            'object_id' => $data['object_id3'],
            'build_id' => $build_id]);
        DB::table('build_object')->insert([
            'object_id' => $data['object_id4'],
            'build_id' => $build_id]);
        DB::table('build_object')->insert([
            'object_id' => $data['object_id5'],
            'build_id' => $build_id]);
        DB::table('build_object')->insert([
            'object_id' => $data['object_id6'],
            'build_id' => $build_id]);
           
        DB::table('build_spell')->insert([
            'spell_id' => $data['spell_id1'],
            'build_id' => $build_id]);
        DB::table('build_spell')->insert([
            'spell_id' => $data['spell_id2'],
            'build_id' => $build_id]);
            
        DB::table('build_user')->insert([
            'user_id' => Auth::User()->id,
            'build_id' => $build->id]);
        return redirect()->route('builds');
    }

    public static function actualizar(array $data, Build $build){
        $build->update($data);
        return redirect()->route('build.details', ['build' => $build]);
    }

    public static function PagCrear(){
        $champions = Champion::All();
        $page_runes = RunePage::All();
        $spells = Spell::All();
        $objects = Object::All();
        return view('build.buildcreate', compact('champions', 'page_runes', 'spells', 'objects'));
    }

    public static function eliminar(Build $build){
        DB::table('build_object')->where('build_id', '=', $build->id)->delete();
        DB::table('build_spell')->where('build_id', '=', $build->id)->delete();
        DB::table('build_user')->where('build_id', '=', $build->id)->delete();
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
        $champion = $build->champion;
        $objects = $build->objects;
        $runesPage = $build->runePage;
        $spells = $build->spells;
        return view('build.build', compact('build', 'champion', 'objects', 'runesPage', 'spells'));
    }

    public static function ordenarAlfabeticamente(){
        $builds = Build::orderBy('name', 'ASC')->paginate(12);
        return view('build.builds', compact('builds'));
    }

    public static function editarInfo(Build $build){
        return view('build.buildedit', compact('build'));
    }
}
