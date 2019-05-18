<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RunePage extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function runes(){
        return $this->belongsToMany('App\Rune');
    }

    public function build(){
        return $this->belongsTo('App\Build');
    }

    public function listPageRunes(String $t1, String $t2){
        $runes1 = Rune::runesType($t1);
        $runes2 = Rune::runesType($t2);
        $type1 = array();$type2 = array();$type3 = array();
        $type4 = array();$type5 = array();$type6 = array();
        foreach($runes1 as $rune){
            if($rune->row == 1){
                $type1[] = $rune;
            }else if($rune->row == 1){
                $type2[] = $rune;
            }else if($rune->row == 1){
                $type3[] = $rune;
            }else{
                $type4[] = $rune;
            }
        }
        $type5 = $type6 = $runes2; 
        return view('runePage.runePagecreate', compact('type1','type2','type3','type4','type5','type6'));  
    }

    protected $fillable = array('name', 'type', 'row');

    public static function crear(array $data){
        /*$rune = new Rune();
        $rune->name = $data['name'];
        $rune->type = $data['type'];
        $rune->row = $data['row'];
        $rune->save();*/
        return redirect()->route('pagrunes');
    }

    public static function actualizar(array $data, RunePage $pagrune){
        $pagrune->update($data);
        return redirect()->route('pagrune.details', ['pagrune' => $pagrune]);
    }

    public static function PagCrear(){
        return view('runePage.runePagecreate');
    }

    public static function eliminar(RunePage $pagrune){
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
