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

    public function show($id) {
        return "Campeon {$id}";
    }
}
