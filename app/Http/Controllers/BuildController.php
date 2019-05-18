<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Build;
use App\Services\ChampionFavorite;
use Illuminate\Support\Facades\Auth;

class BuildController extends Controller
{
    public function index() {
        return Build::listaUserNormal();
    }

    public function show(Build $build) {
        return Build::informacionIndividual($build);
    }

    public function list() {
        return Build::listaUserAdmin();
    }

    public function create() {
        return Build::PagCrear();
    }

    public function store(Request $request){ // Crear build
        // La validacion se debe de hacer en el controlador
        $restrictions = ['name' => ['required', 'unique:builds,name']];
        $errors = ['name.required' => 'El campo nombre está mal'];
        $error_champion; $error_spell1; $error_spell2; $error_pagerune;
        $error_id1; $error_id2; $error_id3; $error_id4; $error_id5; $error_id6;
        $restriction_champion; $restriction_spell1; $restriction_spell2; $restriction_pagerune;
        $restriction_id1; $restriction_id2; $restriction_id3; $restriction_id4; $restriction_id5; $restriction_id6;
        if($request['champion_id'] == 'Ninguno'){
            $restriction_champion = ['champion_id' => 'integer'];
            $error_champion = ['champion_id.integer' => 'Debes de seleccionar algún campeón'];
            array_merge($restrictions, $restriction_id1);
            array_merge($errors, $error_id1);
        }
        $data = request()->validate($restrictions, $errors);
        /*$data = array('name' => $request['name'],
        'champion_id' => $request['champion_id'],
        'page_rune_id' => $request['page_rune_id'],
        'object_id1' => $request['object_id1'],
        'object_id2' => $request['object_id2'],
        'object_id3' => $request['object_id3'],
        'object_id4' => $request['object_id4'],
        'object_id5' => $request['object_id5'],
        'object_id6' => $request['object_id6'],
        'spell_id1' => $request['spell_id1'],
        'spell_id2' => $request['spell_id2'],);*/
        $spells = array($request['spell_id1'], $request['spell_id2']);
        $objects = array($request['object_id1'], $request['object_id2'], $request['object_id3'],
        $request['object_id4'], $request['object_id5'], $request['object_id6']);
        return ChampionFavorite::createBuild($request['name'], Auth::User()->id, $request['champion_id'],
                $request['page_rune_id'], $spells,$objects);
        //return Build::crear($data);

    }

    public function edit(Build $build){
        return Build::editarInfo($build);
    }

    public function update(Build $build){
        /*$data = request()->validate([
            'name' => 'required|unique:builds,name,'.$build->id,
            
        ]);*/
        return Build::actualizar($data, $build);
    }

    public function destroy(Build $build){
        return Build::eliminar($build);
    }

    public function listAlphabetical(){
        return Build::ordenarAlfabeticamente();
    }

    
}
