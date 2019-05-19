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
        $build->update($data['datos']);
        $buildsSpells = DB::table('build_spell')->where('build_id', '=', $build->id)->get();
        $buildsObjects = DB::table('build_object')->where('build_id', '=', $build->id)->get();
        $i = 0;
        foreach($buildsSpells as $buildSpell){
            if(!in_array($buildSpell->spell_id, $data['spells'])){
                //dd($build->id);
                DB::table('build_spell')->where('build_id', '=', $build->id)
                                        ->where('spell_id', '=', (int)$buildSpell->spell_id)
                                        ->update(['spell_id' => (int)$data['spells'][$i]]);
            }
            $i += 1;
        }
        $i = 0;
        foreach($buildsObjects as $buildObject){
            DB::table('build_object')->where('build_id', '=', $build->id)
                                        ->where('object_id', '=', (int)$buildObject->object_id)->take(1)
                                            ->update(['object_id' => (int)$data['objects'][$i]]);
            $i += 1;
        }
        
        return redirect()->route('build.details', ['build' => $build]);
    }

    public static function PagCrear(){
        $champions = Champion::All();
        $page_runes = RunePage::where('user_id', '=', Auth::User()->id)->get();
        $spells = Spell::All();
        $objects = Object::All();
        return view('build.buildcreate', compact('champions', 'page_runes', 'spells', 'objects'));
    }

    public static function eliminar(Build $build){
        /*DB::table('build_object')->where('build_id', '=', $build->id)->delete();
        DB::table('build_spell')->where('build_id', '=', $build->id)->delete();
        DB::table('build_user')->where('build_id', '=', $build->id)->delete();*/
        $build->delete();
        return redirect()->route('builds.list');
    }

    public static function listaUserAdmin(){
        $builds = Build::paginate(20);
        return view('build.buildslist', compact('builds'));
    }

    public static function listaUserNormal(){
        /*$buildsUser = DB::table('build_user')->where('user_id', '=', Auth::User()->id)->paginate(12);
        $builds = array();
        dd($builds);
        foreach($buildsUser as $build){
            $b = Build::Find($build->build_id)->get()->toArray();
            $builds = array_merge($builds, $b);
        } */
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
        $champions = Champion::All();
        $page_runes = RunePage::where('user_id', '=', Auth::User()->id)->get();
        $spells = Spell::All();
        $objects = Object::All();
        $champion_e = $build->champion;
        $pageRune_e = RunePage::Find($build->page_rune_id);
        $spell_id1 = DB::table('build_spell')->where('build_id', '=', $build->id)->first()->spell_id;
        $spell_id2 = DB::table('build_spell')->where('build_id', '=', $build->id)->get()[1]->spell_id;
        $spell_id1_e = Spell::Find($spell_id1);
        $spell_id2_e = Spell::Find($spell_id2);
        $objects_id1 = DB::table('build_object')->where('build_id', '=', $build->id)->first()->object_id;
        $objects_id2 = DB::table('build_object')->where('build_id', '=', $build->id)->get()[1]->object_id;
        $objects_id3 = DB::table('build_object')->where('build_id', '=', $build->id)->get()[2]->object_id;
        $objects_id4 = DB::table('build_object')->where('build_id', '=', $build->id)->get()[3]->object_id;
        $objects_id5 = DB::table('build_object')->where('build_id', '=', $build->id)->get()[4]->object_id;
        $objects_id6 = DB::table('build_object')->where('build_id', '=', $build->id)->get()[5]->object_id;
        $object_id1_e = Object::Find($objects_id1);
        $object_id2_e = Object::Find($objects_id2);
        $object_id3_e = Object::Find($objects_id3);
        $object_id4_e = Object::Find($objects_id4);
        $object_id5_e = Object::Find($objects_id5);
        $object_id6_e = Object::Find($objects_id6);
        return view('build.buildedit', compact('build', 'champions', 'page_runes', 'spells', 'objects', 'champion_e', 'pageRune_e', 
                                                'spell_id1_e', 'spell_id2_e',
                                                'object_id1_e', 'object_id2_e', 'object_id3_e', 'object_id4_e', 'object_id5_e', 'object_id6_e'));
    }
}
