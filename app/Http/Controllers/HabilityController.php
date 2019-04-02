<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Champion;
use App\Hability;


class HabilityController extends Controller
{   
    
    public function index() {
        return Hability::principal();
    }

    public function show(Hability $hability) {
        return Hability::informacionIndividual($hability);
    }

    public function list() {
        return Hability::listar();
    }

    public function create() {
        return Hability::crear();
    }

    public function store(){ // Crear habilidad
        // La validacion se debe de hacer en el controlador
        $data = request()->validate([
            'name' => ['required', 'unique:habilities,name'],
            'description' => 'required',
            'champion_id' => 'required'
        ], [
            'name.required' => 'El campo nombre está mal',
            'description.required' => 'El campo descripción está mal',
            'champion_id.required' => 'El campo campeón está mal'
            
        ]);
        return Hability::create($data);
    }

    public function update(Hability $hability){
        $data = request()->validate([
            'name' => 'required|unique:habilities,name,'.$hability->id,
            'description' => 'required',
            'champion_id' => 'required'
        ]);
        return Hability::upgrade($data, $hability);
    }

    public function edit(Hability $hability){
        return Hability::editarInfo($hability);
    }

    public function destroy(Hability $hability){
        return Hability::eliminar($hability);
    }

}
