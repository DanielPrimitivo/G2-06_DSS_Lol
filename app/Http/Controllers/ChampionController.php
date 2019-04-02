<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Champion;
use App\Hability;


class ChampionController extends Controller
{   
    
    public function index(Request $request) {
        $check = $request->input('order');

        if ($check != null) {
            return Champion::ordenarAlfabeticamente();
        }
        else {
            return Champion::listaUserNormal();
        }
    }

    public function show(Champion $champion) {
        return Champion::informacionIndividual($champion);
    }

    public function list() {
        return Champion::listaUserAdmin();
    }

    public function create() {
        return Champion::PagCrear();
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
        return Champion::crear($data);
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
        return Champion::actualizar($data, $champion);
    }

    public function destroy(Champion $champion){
        return Champion::eliminar($champion);
    }

    public function listAlphabetical(Request $request){
        return Champion::ordenarAlfabeticamente();
    }
}
