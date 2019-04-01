<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Hability;


class UserController extends Controller
{   
    
    public function index() {
        return User::principal();
    }

    public function show(User $usuario) {
        return User::informacionIndividual($usuario);
    }

    public function list() {
        return User::listar();
    }

    public function create() {
        return User::crear();
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
        return User::create($data);
    }

    public function edit(User $usuario){
        return User::editarInfo($usuario);
    }

    public function update(User $usuario){
        $data = request()->validate([
            'name' => 'required|unique:champions,name,'.$usuario->id,
            'rol' => 'required',
            'title' => 'required',
            'location' => 'required'
        ]);
        return User::upgrade($data, $usuario);
    }

    public function destroy(User $usuario){
        return User::eliminar($usuario);
    }

    public function listAlphabetical(){
        return User::ordenarAlfabeticamente();
    }
}
