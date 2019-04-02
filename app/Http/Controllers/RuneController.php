<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rune;

class RuneController extends Controller
{
    public function index() {
        return Rune::listaUserNormal();
    }

    public function show(Rune $rune) {
        return Rune::informacionIndividual($rune);
    }

    public function list() {
        return Rune::listaUserAdmin();
    }

    public function create() {
        return Rune::PagCrear();
    }

    public function store(){ // Crear runa
        // La validacion se debe de hacer en el controlador
        $data = request()->validate([
            'name' => ['required', 'unique:runes,name'],
            'type' => 'required',
            'row' => 'required'
        ], [
            'name.required' => 'El campo nombre está mal',
            'type.required' => 'El campo tipo está mal',
            'row.required' => 'El campo fila está mal'
        ]);
        return Rune::crear($data);
    }

    public function edit(Rune $rune){
        return Rune::editarInfo($rune);
    }

    public function update(Rune $rune){
        $data = request()->validate([
            'name' => 'required|unique:runes,name,'.$rune->id,
            'type' => 'required',
            'row' => 'required'
        ]);
        return Rune::actualizar($data, $rune);
    }

    public function destroy(Rune $rune){
        return Rune::eliminar($rune);
    }

    public function listAlphabetical(){
        return Rune::ordenarAlfabeticamente();
    }
}
