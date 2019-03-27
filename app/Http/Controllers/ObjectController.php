<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Object;

class ObjectController extends Controller
{
    public function index() {
        $objects = Object::all();

        return view('objects', compact('objects'));
    }

    public function show($id) {
        $object = Object::findOrFail($id);

        return view('object', compact('object'));
    }

    public function create() {
        return "Nuevo objeto";
    }
}
