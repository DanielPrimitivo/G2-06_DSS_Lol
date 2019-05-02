<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Build;

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

    public function store(){ // Crear build
        // La validacion se debe de hacer en el controlador
        $data = request()->validate([
            'object_name' => 'required',
            'champion_name' => 'required',
            'page_rune_id' => 'required',
            'spell_name' => 'required'
        ], [
            'object_name.required' => 'El campo nombre del objeto está mal',
            'champion_name.required' => 'El campo nombre del campeón está mal',
            'page_rune_id.required' => 'El campo identificador de la página de runa está mal',
            'spell_name.required' => 'El campo nombre de hechizo estñá mal'
        ]);
        return Build::crear($data);
    }

    public function edit(Build $build){
        return Build::editarInfo($build);
    }

    public function update(Build $build){
        $data = request()->validate([
            'name' => 'required|unique:builds,name,'.$build->id,
            'object_name' => 'required',
            'champion_name' => 'required',
            'page_rune_id' => 'required',
            'spell_name' => 'required'
        ]);
        return Build::actualizar($data, $build);
    }

    public function destroy(Build $build){
        return Build::eliminar($build);
    }

    public function listAlphabetical(){
        return Build::ordenarAlfabeticamente();
    }
}
