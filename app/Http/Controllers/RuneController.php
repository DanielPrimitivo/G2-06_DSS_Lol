<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rune;

class RuneController extends Controller
{
    public function index() {
        $runes = Rune::all();

        return view('runes', compact('runes'));
    }

    public function show($id) {
        return "Runa {$id}";
    }

    public function create() {
        return "Nueva runa";
    }
}
