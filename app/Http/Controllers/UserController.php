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

    public function show(Int $id) {
        return User::informacionIndividual($id);
    }

    public function list() {
        return User::listar();
    }

    public function destroy(Int $id){
        return User::eliminar($id);
    }

}
