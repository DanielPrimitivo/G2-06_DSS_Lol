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
        $build->champion_name = $data['champion_name'];
        $build->page_rune_id = $data['page_rune_id'];
        $build->save();

        $object1 = DB::table('objects')->where('name', '=', $data['object1'])->get();
        $object2 = DB::table('objects')->where('name', '=', $data['object2'])->get();
        $object3 = DB::table('objects')->where('name', '=', $data['object3'])->get();
        $object4 = DB::table('objects')->where('name', '=', $data['object4'])->get();
        $object5 = DB::table('objects')->where('name', '=', $data['object5'])->get();
        $object6 = DB::table('objects')->where('name', '=', $data['object6'])->get();

        $spell1 = DB::table('spells')->where('name', '=', $data['spell1'])->get();
        $spell2 = DB::table('spells')->where('name', '=', $data['spell2'])->get();

        
        $build = Build::all()->last();
        DB::table('builds_objects')->insert([
            'object_id' => $object1->id,
            'build_id' => $build->id]);
        DB::table('builds_objects')->insert([
            'object_id' => $object2->id,
            'build_id' => $build->id]);
        DB::table('builds_objects')->insert([
            'object_id' => $object3->id,
            'build_id' => $build->id]);
        DB::table('builds_objects')->insert([
            'object_id' => $object4->id,
            'build_id' => $build->id]);
        DB::table('builds_objects')->insert([
            'object_id' => $object5->id,
            'build_id' => $build->id]);
        DB::table('builds_objects')->insert([
            'object_id' => $object6->id,
            'build_id' => $build->id]);

        DB::table('builds_spells')->insert([
            'spell_id' => $spell1->id,
            'build_id' => $build->id]);
        DB::table('builds_spells')->insert([
            'spell_id' => $spell2->id,
            'build_id' => $build->id]);

        DB::table('builds_users')->insert([
            'user_id' => $data['user'],
            'build_id' => $build->id]);

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
