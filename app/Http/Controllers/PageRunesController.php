<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RunePage;

class PageRunesController extends Controller
{
    public function showTypes(Request $request){
        $t1 = $request->input('type1'); // Como se llame a lo que seleccione
        $t2 = $request->input('type2'); // Como se llame a lo que seleccione
        return RunePage::listPageRunes($t1, $t2);
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

    public function create() {
        return RunePage::PagCrear();
    }

    public function store(Request $request){ // Crear runa
        // La validacion se debe de hacer en el controlador
        $restrictions = ['name' => ['required', 'unique:rune_pages,name']];
        $errors = ['name.required' => 'El campo nombre está mal'];
        $error_id1; $error_id2; $error_id3; $error_id4; $error_id5; $error_id6;
        $restriction_id1; $restriction_id2; $restriction_id3; $restriction_id4; $restriction_id5; $restriction_id6;
        //$request->input('rune_id1');
        if($request['rune_id1'] == 'Ninguno'){
            $restriction_id1 = ['rune_id1' => 'integer'];
            $error_id1 = ['rune_id1.integer' => 'Debes de seleccionar alguna runa'];
            array_merge($restrictions, $restriction_id1);
            array_merge($errors, $error_id1);
        }
        if($request['rune_id2'] == 'Ninguno'){
            $restriction_id2 = ['rune_id2' => 'integer'];
            $error_id2 = ['rune_id2.integer' => 'Debes de seleccionar alguna runa'];
            array_merge($restrictions, $restriction_id2);
            array_merge($errors, $error_id2);
        }
        if($request['rune_id3'] == 'Ninguno'){
            $restriction_id3 = ['rune_id3' => 'integer'];
            $error_id3 = ['rune_id3.integer' => 'Debes de seleccionar alguna runa'];
            array_merge($restrictions, $restriction_id3);
            array_merge($errors, $error_id3);
        }
        if($request['rune_id4'] == 'Ninguno'){
            $restriction_id4 = ['rune_id4' => 'integer'];
            $error_id4 = ['rune_id4.integer' => 'Debes de seleccionar alguna runa'];
            array_merge($restrictions, $restriction_id4);
            array_merge($errors, $error_id4);
        }
        if($request['rune_id5'] == 'Ninguno'){
            $restriction_id5 = ['rune_id5' => 'integer'];
            $error_id5 = ['rune_id5.integer' => 'Debes de seleccionar alguna runa'];
            array_merge($restrictions, $restriction_id5);
            array_merge($errors, $error_id5);
        }
        if($request['rune_id6'] == 'Ninguno'){
            $restriction_id6 = ['rune_id6' => 'integer'];
            $error_id6 = ['rune_id6.integer' => 'Debes de seleccionar alguna runa'];
            array_merge($restrictions, $restriction_id6);
            array_merge($errors, $error_id6);
        }
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

    public function update(RunePage $pagrune){
        $data = request()->validate([
            'name' => 'required|unique:pagesrunes,name,'.$pagrune->id,
            'type' => 'required',
            'row' => 'required'
        ]);
        return RunePage::actualizar($data, $pagrune);
    }

    public function destroy(RunePage $pagrune){
        return RunePage::eliminar($pagrune);
    }
}