<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Object;

class ObjectController extends Controller
{
    public function index() {
        return Object::listaUserNormal();
    }

    public function show(Object $object) {
        return Object::informacionIndividual($object);
    }

    public function list() {
        return Object::listaUserAdmin();
    }

    public function create() {
        return Object::PagCrear();
    }

    public function store(){ // Crear campeon
        // La validacion se debe de hacer en el controlador
        $data = request()->validate([
            'name' => ['required', 'unique:objects,name'],
            'price' => 'required',
            'description' => 'required',
            'type' => 'required',
            'subtype' => 'required'
        ], [
            'name.required' => 'El campo nombre está mal',
            'price.required' => 'El campo precio está mal',
            'description.required' => 'El campo descripcion está mal',
            'type.required' => 'El campo tipo está mal',
            'subtype.required' => 'El campo subtipo está mal'
        ]);
        return Object::crear($data);
    }

    public function edit(Object $object){
        return Object::editarInfo($object);
    }

    public function update(Object $object){
        $data = request()->validate([
            'name' => 'required|unique:objects,name,'.$object->id,
            'price' => 'required',
            'description' => 'required',
            'type' => 'required',
            'subtype' => 'required'
        ]);
        return Object::actualizar($data, $object);
    }

    public function destroy(Object $object){
        return Object::eliminar($object);
    }

    public function listAlphabetical(){
        return Object::ordenarAlfabeticamente();
    }
}
