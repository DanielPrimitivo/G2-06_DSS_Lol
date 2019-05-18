<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use DB;

class RunePage extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function runes(){
        return $this->belongsToMany('App\Rune');
    }

    public function builds(){
        return $this->hasMany('App\Build');
    }

    protected $fillable = array('name', 'user_id');

    public static function listPageRunes(String $t1, String $t2){
        $runes1 = Rune::runesType($t1);
        $runes2 = Rune::runesType($t2);
        $type1 = array();$type2 = array();$type3 = array();
        $type4 = array();$type5 = array();$type6 = array();
        foreach($runes1 as $rune){
            if($rune->row == 1){
                $type1[] = $rune;
            }else if($rune->row == 2){
                $type2[] = $rune;
            }else if($rune->row == 3){
                $type3[] = $rune;
            }else{
                $type4[] = $rune;
            }
        }
        $type5 = $type6 = $runes2; 
        return view('runePage.runePagecreate', compact('type1','type2','type3','type4','type5','type6', 't1', 't2'));  
    }

    public static function crear(array $data){
        $pagrune = new RunePage();
        $pagrune->name = $data['name'];
        $user = Auth::User();
        $pagrune->user_id = $user->id;
        $pagrune->save();
        $id = RunePage::all()->last()->id;

        DB::table('rune_runePages')->insert([
            'rune_id' => $data['rune_id1'],
            'runePage_id' => $id]);
        DB::table('rune_runePages')->insert([
            'rune_id' => $data['rune_id2'],
            'runePage_id' => $id]);
        DB::table('rune_runePages')->insert([
            'rune_id' => $data['rune_id3'],
            'runePage_id' => $id]);
        DB::table('rune_runePages')->insert([
            'rune_id' => $data['rune_id4'],
            'runePage_id' => $id]);
        DB::table('rune_runePages')->insert([
            'rune_id' => $data['rune_id5'],
            'runePage_id' => $id]);
        DB::table('rune_runePages')->insert([
            'rune_id' => $data['rune_id6'],
            'runePage_id' => $id]);

        return redirect()->route('pagrunes');
    }

    public static function actualizar(array $data, RunePage $pagrune){
        $pagrune->update($data);
        return redirect()->route('pagrune.details', ['runePage' => $runePage]);
    }

    public static function PagCrear(){
        $type1 = array();$type2 = array();$type3 = array();
        $type4 = array();$type5 = array();$type6 = array();
        $t1 = "";
        $t2 = "";
        return view('runePage.runePagecreate', compact('type1','type2','type3','type4','type5','type6', 't1', 't2'));
    }

    public static function eliminar(RunePage $pagrune){
        
        $rune_runePages = DB::table('rune_runePages')->where('runePage_id', '=', $pagrune->id)->delete();
        $builds = Build::where('page_rune_id', '=', $pagrune->id)->get();
        foreach($builds as $build) {
            Build::eliminar($build);
        }
        $pagrune->delete();
        
        return redirect()->route('pagrunes.list');
    }

    public static function listaUserAdmin(){
        $runePages = RunePage::paginate(20);
        return view('runePage.runePageslist', compact('runePages'));
    }

    public static function listaUserNormal(){
        $runePages = RunePage::paginate(12);
        return view('runePage.runePages', compact('runePages'));
    }

    public static function informacionIndividual(RunePage $runePage){
        return view('runePage.runePage', compact('runePage'));
    }

    public static function ordenarAlfabeticamente(){
        $runePages = RunePage::orderBy('name', 'ASC')->paginate(12);
        return view('runePage.runePages', compact('runePages'));
    }

    public static function editarInfo(RunePage $runePage){
        return view('runePage.runePageedit', compact('runePage'));
    }
}
