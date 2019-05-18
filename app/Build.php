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

    public function users(){
        return $this->belongsToMany('App\User');
    }

    protected $fillable = array('object_name', 'champion_id', 'page_rune_id', 'spell_name');

    public static function crear(array $data){
        $build = new Build();
        $build->champion_id = $data['champion_id'];
        $build->page_rune_id = $data['page_rune_id'];
        $build->save();

        
        $build_id = Build::all()->last()->id;
        DB::table('builds_objects')->insert([
            'object_id' => $data['object_id1'],
            'build_id' => $build_id]);
        DB::table('builds_objects')->insert([
            'object_id' => $data['object_id2'],
            'build_id' => $build_id]);
        DB::table('builds_objects')->insert([
            'object_id' => $data['object_id3'],
            'build_id' => $build_id]);
        DB::table('builds_objects')->insert([
            'object_id' => $data['object_id4'],
            'build_id' => $build_id]);
        DB::table('builds_objects')->insert([
            'object_id' => $data['object_id5'],
            'build_id' => $build_id]);
        DB::table('builds_objects')->insert([
            'object_id' => $data['object_id6'],
            'build_id' => $build_id]);

        DB::table('builds_spells')->insert([
            'spell_id' => $data['spell_id1'],
            'build_id' => $build_id]);
        DB::table('builds_spells')->insert([
            'spell_id' => $data['spell_id2'],
            'build_id' => $build_id]);

        DB::table('builds_users')->insert([
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
        $champion = $build->champions;
        $objects = $build->objects;
        $runesPage = $build->runesPages;
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
