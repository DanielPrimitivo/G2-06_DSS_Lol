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

    public static function actualizar(array $data, RunePage $runePage){
        $runePage->update($data);
        $runeRunePages = DB::table('rune_runePages')->where('runePage_id', '=', $runePage->id)->get();
        $i = 0;
        foreach($runeRunePages as $runeRunePage){
            if(!in_array($runeRunePage->rune_id, $data['runas'])){
                DB::table('rune_runePages')->where('runePage_id', '=', $runePage->id)
                                                ->where('rune_id', '=', $runeRunePage->rune_id)
                                                 ->update(['rune_id' => $data['runas'][$i]]);
            }
            $i += 1;
        }
        return RunePage::informacionIndividual($runePage);
    }

    public static function PagCrear(){
        $type1 = array();$type2 = array();$type3 = array();
        $type4 = array();$type5 = array();$type6 = array();
        $t1 = "";
        $t2 = "";
        return view('runePage.runePagecreate', compact('type1','type2','type3','type4','type5','type6', 't1', 't2'));
    }

    public static function eliminar(RunePage $pagrune){
        $pagrune->delete();
        return redirect()->route('pagrunes.list');
    }

    public static function listaUserAdmin(){
        $runePages = RunePage::paginate(12);
        return view('runePage.runePageslist', compact('runePages'));
    }

    public static function listaUserNormal(){
        $runePages = RunePage::where('user_id', '=', Auth::User()->id)->paginate(12);
        return view('runePage.runePages', compact('runePages'));
    }

    public static function informacionIndividual(RunePage $runePage){
        $runesRunesPages = DB::table('rune_runePages')->where('runePage_id', '=', $runePage->id)->get();
        $t1 = ""; $t2 = "";
        $rune1;$rune2;$rune3;$rune4;$rune5;$rune6;
        $i = 1;
        foreach($runesRunesPages as $runeRunePage){
            $rune = Rune::find($runeRunePage->rune_id);
            if($i == 1){
                $rune1 = $rune;
            }else if($i == 2){
                $rune2 = $rune;
            }else if($i == 3){
                $rune3 = $rune;
            }else if($i == 4){
                $rune4 = $rune;
            }else if($i == 5){
                $rune5 = $rune;
            }else if($i == 6){
                $rune6 = $rune;
            }
            if($t1 == ""){
                $t1 = $rune->type;
            }else if($rune->type != $t1){
                    $t2 = $rune->type;
            }
            $i += 1;
        }
        $runesPrimary = array($rune1, $rune2, $rune3, $rune4);
        $runesSecundary = array($rune5, $rune6);
        return view('runePage.runePage', compact('runePage', 't1', 't2', 'runesPrimary', 'runesSecundary'));
    }

    public static function ordenarAlfabeticamente(){
        $runePages = RunePage::orderBy('name', 'ASC')->paginate(12);
        return view('runePage.runePages', compact('runePages'));
    }

    public static function editarInfo(RunePage $runePage){
        $runesRunesPages = DB::table('rune_runePages')->where('runePage_id', '=', $runePage->id)->get();
        $t1 = ""; $t2 = "";
        $rune1;$rune2;$rune3;$rune4;$rune5;$rune6;
        $i = 1;
        foreach($runesRunesPages as $runeRunePage){
            $rune = Rune::find($runeRunePage->rune_id);
            if($i == 1){
                $rune1 = $rune;
            }else if($i == 2){
                $rune2 = $rune;
            }else if($i == 3){
                $rune3 = $rune;
            }else if($i == 4){
                $rune4 = $rune;
            }else if($i == 5){
                $rune5 = $rune;
            }else if($i == 6){
                $rune6 = $rune;
            }
            if($t1 == ""){
                $t1 = $rune->type;
            }else if($rune->type != $t1){
                    $t2 = $rune->type;
            }
            $i += 1;
        }
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
        return view('runePage.runePageedit', compact('type1','type2','type3','type4','type5','type6', 't1', 't2', 'runePage', 'rune1', 'rune2', 'rune3', 'rune4', 'rune5', 'rune6'));
    }
}
