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
        return view('build.buildcreate', compact('type1','type2','type3','type4','type5','type6'));  
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
        return view('pagrune.pagrunecreate');
    }

    public static function eliminar(RunePage $pagrune){
        $pagrune->delete();
        return redirect()->route('pagrunes.list');
    }

    public static function listaUserAdmin(){
        $pagrunes = RunePage::paginate(20);
        return view('pagrune.pagruneslist', compact('pagrunes'));
    }

    public static function listaUserNormal(){
        $pagrunes = RunePage::paginate(12);
        return view('pagrune.pagrunes', compact('pagrunes'));
    }

    public static function informacionIndividual(RunePage $pagrune){
        return view('pagrune.pagrune', compact('pagrune'));
    }

    public static function ordenarAlfabeticamente(){
        $pagrunes = RunePage::orderBy('name', 'ASC')->paginate(12);
        return view('pagrune.pagrunes', compact('pagrunes'));
    }

    public static function editarInfo(RunePage $pagrune){
        return view('pagrune.pagruneedit', compact('pagrune'));
    }
}
