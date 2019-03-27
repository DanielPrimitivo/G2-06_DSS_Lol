<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Champion;

class ChampionController extends Controller
{
    public function index() {
        $champions = Champion::all();

        return view('champions', compact('champions'));
    }

    public function show(Champion $champion) {

        //$champion = Champion::findOrFail($id);
        //dd($champion);
        return view('champion', compact('champion'));
    }

    public function create() {
        return "Nuevo campeon";
    }
}
