<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ObjectController extends Controller
{
    public function index() {
        $objects = Object::all();

        return view('objects', compact('objects'));
    }

    public function show($id) {
        return "Objeto {$id}";
    }

    public function create() {
        return "Nuevo objeto";
    }
}
