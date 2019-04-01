<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Champion;
use App\Hability;


class ChampionController extends Controller
{   
    
    public function index() {
        $champion = new Champion();
        return $champion->principal();
    }

    public function show(Champion $champion) {
        return view('champion', compact('champion'));
    }

    public function list() {
        
        return $champion->listar();
    }

    public function create() {
        return view('championcreate');
    }

    public function store(){ // Crear campeon
        $champion = new Champion();
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
        return $champion->create($data);
    }

    public function edit(Champion $champion){
        return view('championedit', compact('champion'));
    }

    public function update(Champion $champion){
        $data = request()->validate([
            'name' => 'required|unique:champions,name,'.$champion->id,
            'rol' => 'required',
            'title' => 'required',
            'location' => 'required'
        ]);
        return $champion->upgrade($data, $champion);
    }

    public function destroy(Champion $champion){
        return $champion->eliminar($champion);
    }

    public function listAlphabetical(){
        $champion = new Champion();
        return $champion->ordenarAlfabeticamente();
    }
}
