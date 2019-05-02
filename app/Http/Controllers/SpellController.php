<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spell;

class SpellController extends Controller
{
    public function index() {
        return Spell::listaUserNormal();
    }

    public function show(Spell $spell) {
        return Spell::informacionIndividual($spell);
    }

    public function list() {
        return Spell::listaUserAdmin();
    }

    public function create() {
        return Spell::PagCrear();
    }

    public function store(){ // Crear spell rune
        // La validacion se debe de hacer en el controlador
        $data = request()->validate([
            'name' => ['required', 'unique:spells,name'],
            'description' => 'required'
        ], [
            'name.required' => 'El campo nombre está mal',
            'description.required' => 'El campo tipo está mal'
        ]);
        return Spell::crear($data);
    }

    public function edit(Spell $spell){
        return Spell::editarInfo($spell);
    }

    public function update(Spell $spell){
        $data = request()->validate([
            'name' => 'required|unique:spells,name,'.$spell->id,
            'description' => 'required'
        ]);
        return Spell::actualizar($data, $spell);
    }

    public function destroy(Spell $spell){
        return Spell::eliminar($spell);
    }

    public function listAlphabetical(){
        return Spell::ordenarAlfabeticamente();
    }
}
