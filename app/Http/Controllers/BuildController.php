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

    public function correcto(array $datos, String $validate, String $mode, String $name, int $buildID){
        $nameE = [];
        $nameR = [];
        if($mode == "create"){
            $nameE = ['name.required' => 'El campo nombre está mal'];
            $nameR = ['name' => ['required', 'unique:rune_pages,name']];
        }else if($mode == "update"){
            if($name == ""){
                $nameE = ['name.required' => 'El campo nombre está vacio'];
                $nameR = ['name' => ['required']];
            }else if(Build::Find($buildID)->name != $name){
                $nameE = ['name.required' => 'El campo nombre está mal',
                          'name.unique' => 'El campo nombre ya existe en la Base de datos, cambialo'];
                $nameR = ['name' => ['required', 'unique:rune_pages,name']];
            }            
        }
        if($validate == 'errors'){
            $i = 1;
            $errors = $nameE;
            foreach($datos as $dato){
                $errors = array_merge($errors, $this->errorNinguno($dato, strval($i)));
                $i += 1;
            }
            return $errors;
        }else{
            $i = 1;
            $restrictions = $nameR;
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
        $name = "";
        if($request['name'] != null){
            $name = $request['name'];
        }
        $errors = $this->correcto($datos, "errors", "create", $name, 0);
        $restrictions = $this->correcto($datos, "", "create", $name, 0);
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

    public function update(Build $build, Request $request){
        $datos = ['name' => $request['name'],
                  'champion_id' => $request['champion_id'],
                  'page_rune_id' => $request['page_rune_id']];
        $name = "";
        if($request['name'] != null){
            $name = $request['name'];
        }
        $errors = $this->correcto($datos, "errors", "update", $name, $build->id);
        $restrictions = $this->correcto($datos, "", "update", $name, $build->id);
        $data = request()->validate($restrictions, $errors);
        $objects = array($request['object_id1'], $request['object_id2'], $request['object_id3'], $request['object_id4'], $request['object_id5'], $request['object_id6']);
        $spells = array($request['spell_id1'], $request['spell_id2']);
        $data = array('datos' => $datos,
                'objects' => $objects,
                'spells' => $spells);
        return Build::actualizar($data, $build);
    }

    public function destroy(Build $build){
        return Build::eliminar($build);
    }

    public function listAlphabetical(){
        return Build::ordenarAlfabeticamente();
    }

    
}
