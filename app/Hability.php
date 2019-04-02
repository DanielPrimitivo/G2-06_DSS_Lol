<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hability extends Model
{
    public function champion(){
        return $this->belongsTo('App\Champion');
    }

    public static function informacionIndividual(Hability $hability){
        $champion = Champion::where('id', '=', $hability->champion_id);
        return view('hability', compact('hability', 'champion'));
    }

    public static function principal(){
        $habilities = Hability::paginate(18);
        return view('habilities', compact('habilities'));
    }

    public static function listar(){
        $habilities = Hability::paginate(18);
        return view('habilitieslist', compact('habilities'));
    }

    public static function create(array $data){
        $hability = new Hability();
        $hability->name = $data['name'];
        $hability->description = $data['description'];
        $hability->champion_id = $data['champion_id'];
        $hability->save();
        return redirect()->route('habilities');
    }

    public static function crear(){
        return view('habilitycreate');
    }

    public static function upgrade(array $data, Hability $hability){
        $hability->update($data);
        dd($hability);
        return redirect()->route('hability.details', ['hability' => $hability]);
    }

    public static function eliminar(Hability $hability){
        $hability->delete();
        return redirect()->route('habilities.list');
    }

    public static function editarInfo(Hability $hability){
        return view('habilityedit', compact('hability'));
    }

    
}
