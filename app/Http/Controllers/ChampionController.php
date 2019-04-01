<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Champion;
use App\Hability;


class ChampionController extends Controller
{   
    
    public function index() {
        return Champion::principal();
    }

    public function show(Champion $champion) {
        return Champion::informacionIndividual($champion);
    }

    public function list() {
        return Champion::listar();
    }

    public function create() {
        return Champion::crear();
    }

    public function store(){ // Crear campeon
        // La validacion se debe de hacer en el controlador
        $data = request()->validate([
            'name' => ['required', 'unique:champions,name'],
            'rol' => 'required',
            'title' => 'required',
            'location' => 'required'
        ], [
            'name.required' => 'El campo nombre está mal',
            'rol.required' => 'El campo rol está mal',
            'title.required' => 'El campo titulo está mal',
            'location.required' => 'El campo localizacion está mal'
        ]);
        return Champion::create($data);
    }

    public function edit(Champion $champion){
        return Champion::editarInfo($champion);
    }

    public function update(Champion $champion){
        $data = request()->validate([
            'name' => 'required|unique:champions,name,'.$champion->id,
            'rol' => 'required',
            'title' => 'required',
            'location' => 'required'
        ]);
        return Champion::upgrade($data, $champion);
    }

    public function destroy(Champion $champion){
        return Champion::eliminar($champion);
    }

    public function listAlphabetical(){
        return Champion::ordenarAlfabeticamente();
    }
}
