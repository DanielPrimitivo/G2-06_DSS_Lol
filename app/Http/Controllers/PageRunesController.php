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

    public function store(){ // Crear runa
        // La validacion se debe de hacer en el controlador
        $data = request()->validate([
            'name' => ['required', 'unique:pagesrunes,name'],
            'type' => 'required',
            'row' => 'required'
        ], [
            'name.required' => 'El campo nombre está mal',
            'type.required' => 'El campo tipo está mal',
            'row.required' => 'El campo fila está mal'
        ]);
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