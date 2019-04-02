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

    public function destroy(User $usuario){
        return User::eliminar($usuario);
    }

}
