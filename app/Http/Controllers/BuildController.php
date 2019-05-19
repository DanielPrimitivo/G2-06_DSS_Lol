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

    private function errorNinguno(String $dato, String $id){
        if($dato == 'Ninguno'){
            if($id == '1'){
                return ['champion_id.integer' => 'Debes de seleccionar el nombre del campeon'];
            }elseif($id == '2'){
                return ['page_rune_id.integer' => 'Debes de seleccionar una pagina de runas'];
            }elseif($id == '3' || $id == '4'){
                $finalID = strval((int)$id - 2);
                return ['spell_id'.$finalID.'.integer' => 'Debes de seleccionar el hechizo numero '.$finalID];
            }else{
                $finalID = strval((int)$id - 4);
                return ['object_id'.$finalID.'.integer' => 'Debes de seleccionar el objeto numero '.$finalID];
            }
        }else{
            return [];
        }
    }

    private function retristictionNinguno(String $dato, String $id){
        if($dato == 'Ninguno'){
            if($id == '1'){
                return ['champion_id' => 'integer'];
            }elseif($id == '2'){
                return ['page_rune_id' => 'integer'];
            }elseif($id == '3' || $id == '4'){
                $finalID = strval((int)$id - 2);
                return ['spell_id'.$finalID => 'integer'];
            }else{
                $finalID = strval((int)$id - 4);
                return ['object_id'.$finalID => 'integer'];
            }
        }else{
            return [];
        }
    }

    public function correcto(array $datos, String $validate){
        if($validate == 'errors'){
            $i = 1;
            $errors = ['name.required' => 'El campo nombre está mal'];
            foreach($datos as $dato){
                $errors = array_merge($errors, $this->errorNinguno($dato, strval($i)));
                $i += 1;
            }
            return $errors;
        }else{
            $i = 1;
            $restrictions = ['name' => ['required', 'unique:builds,name']];
            foreach($datos as $dato){
                $restrictions = array_merge($restrictions, $this->retristictionNinguno($dato, strval($i)));
                $i += 1;
            }
            return $restrictions;
        }
    }

    public function store(Request $request){ // Crear build
        // La validacion se debe de hacer en el controlador
        $datos = array($request['champion_id'], $request['page_rune_id'], 
            $request['spell_id1'], $request['spell_id2'], $request['object_id1'], 
            $request['object_id2'], $request['object_id3'], $request['object_id4'],
            $request['object_id5'], $request['object_id6']);
        $errors = $this->correcto($datos, "errors");
        $restrictions = $this->correcto($datos, "");
        $data = request()->validate($restrictions, $errors);
        $spells = array($request['spell_id1'], $request['spell_id2']);
        $objects = array($request['object_id1'], $request['object_id2'], $request['object_id3'],
        $request['object_id4'], $request['object_id5'], $request['object_id6']);
        return ChampionFavorite::createBuild($request['name'], Auth::User()->id, $request['champion_id'],
                $request['page_rune_id'], $spells,$objects);
    }

    public function edit(Build $build){
        return Build::editarInfo($build);
    }

    public function update(Build $build){
        $datos = array($request['champion_id'], $request['page_rune_id'], 
            $request['spell_id1'], $request['spell_id2'], $request['object_id1'], 
            $request['object_id2'], $request['object_id3'], $request['object_id4'],
            $request['object_id5'], $request['object_id6']);
        $errors = $this->correcto($datos, "errors");
        $restrictions = $this->correcto($datos, "");
        $data = request()->validate($restrictions, $errors);

        return Build::actualizar($data, $build);
    }

    public function destroy(Build $build){
        return Build::eliminar($build);
    }

    public function listAlphabetical(){
        return Build::ordenarAlfabeticamente();
    }

    
}
