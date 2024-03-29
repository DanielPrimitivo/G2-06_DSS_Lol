<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RunePage;
use Illuminate\Support\Facades\Auth;

class PageRunesController extends Controller
{
    public function showTypes(Request $request){
        $t1 = $request->input('type1'); // Como se llame a lo que seleccione
        $t2 = $request->input('type2'); // Como se llame a lo que seleccione
        if($t1 != 'Ninguno' && $t2 != 'Ninguno' && $t1 == $t2){
            $data = request()->validate([
                'type1' => 'integer'
            ], [
                'type1.integer' => 'Tipo primario y secundario no deben de ser iguales'
            ]);
        }
        
        return RunePage::listPageRunes($t1, $t2);
    }

    public function showTypesEdit(Request $request){
        $t1 = $request->input('type1'); // Como se llame a lo que seleccione
        $t2 = $request->input('type2'); // Como se llame a lo que seleccione
        if($t1 != 'Ninguno' && $t2 != 'Ninguno' && $t1 == $t2){
            $data = request()->validate([
                'type1' => 'integer'
            ], [
                'type1.integer' => 'Tipo primario y secundario no deben de ser iguales'
            ]);
        }
        
        return RunePage::editarInfo($t1, $t2);
    }

    public function index() {
        return RunePage::listaUserNormal();
    }

    public function show(RunePage $pagrune) {
        return RunePage::informacionIndividual($pagrune);
    }

    public function list() {
        return RunePage::listaUserAdmin();
    }

    public function create(Request$request) {
        return RunePage::PagCrear();
    }

    private function errorNinguno(String $dato, String $idRuna){
        if($dato == 'Ninguno'){
            return ['rune_id'.$idRuna.'.integer' => 'Debes de seleccionar la runa '.$idRuna];
        }else{
            return [];
        }
    }

    private function retristictionNinguno(String $dato, String $idRuna){
        if($dato == 'Ninguno'){
            return ['rune_id'.$idRuna => 'integer'];
        }else{
            return [];
        }
    }

    public function correcto(array $datos, String $validate, String $mode, String $name, int $runeID){
        $nameE = [];
        $nameR = [];
        if($mode == "create"){
            $nameE = ['name.required' => 'El campo nombre está mal'];
            $nameR = ['name' => ['required', 'unique:rune_pages,name']];
        }else if($mode == "update"){
            if($name == ""){
                $nameE = ['name.required' => 'El campo nombre está vacio'];
                $nameR = ['name' => ['required']];
            }else if(RunePage::Find($runeID)->name != $name){
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

    public function store(Request $request){ // Crear runa
        // La validacion se debe de hacer en el controlador
        $datos = array($request['rune_id1'], $request['rune_id2'], $request['rune_id3'], $request['rune_id4'], $request['rune_id5'], $request['rune_id6']);
        $name = "";
        if($request['name'] != null){
            $name = $request['name'];
        }
        $errors = $this->correcto($datos, "errors", "create", $name, 0);
        $restrictions = $this->correcto($datos, "", "create", $name, 0);
        $data = request()->validate($restrictions, $errors);
        $data = array(
            'name' => $request['name'],
            'rune_id1' => $request['rune_id1'],
            'rune_id2' => $request['rune_id2'],
            'rune_id3' => $request['rune_id3'],
            'rune_id4' => $request['rune_id4'],
            'rune_id5' => $request['rune_id5'],
            'rune_id6' => $request['rune_id6']
        );
        return RunePage::crear($data);
    }

    public function edit(RunePage $pagrune){
        return RunePage::editarInfo($pagrune);
    }

    public function update(Request $request, RunePage $pagrune){
        $datos = array($request['rune_id1'], $request['rune_id2'], $request['rune_id3'], $request['rune_id4'], $request['rune_id5'], $request['rune_id6']);
        $name = "";
        if($request['name'] != null){
            $name = $request['name'];
        }
        $errors = $this->correcto($datos, "errors", "update", $name, $pagrune->id);
        $restrictions = $this->correcto($datos, "", "update", $name, $pagrune->id);
        $data = request()->validate($restrictions, $errors);
        $data = array(
            'name' => $request['name'],
            'runas' => $datos,
            /*'rune_id1' => $request['rune_id1'],
            'rune_id2' => $request['rune_id2'],
            'rune_id3' => $request['rune_id3'],
            'rune_id4' => $request['rune_id4'],
            'rune_id5' => $request['rune_id5'],
            'rune_id6' => $request['rune_id6'],*/
            'user_id' => Auth::User()->id
        );
        return RunePage::actualizar($data, $pagrune);
    }

    public function destroy(RunePage $pagrune){
        return RunePage::eliminar($pagrune);
    }
}