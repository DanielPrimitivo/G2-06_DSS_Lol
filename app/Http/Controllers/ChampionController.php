<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Champion;
use App\Hability;
use DB;

class ChampionController extends Controller
{
    public function index() {
        $champions = Champion::paginate(12);
         return view('champions', compact('champions'));
    }

    public function show(Champion $champion) {
        return view('champion', compact('champion'));
    }

    public function list() {
        $champions = Champion::paginate(20);

        return view('championslist', compact('champions'));
    }

    public function create() {
        return view('championcreate');
    }

    public function store(){

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
        
        Champion::create([
            'name' => $data['name'],
            'rol' => $data['rol'],
            'title' => $data['title'],
            'location' => $data['location']
        ]);

        return redirect()->route('champions');
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

        $champion->update($data);

        return redirect()->route('champion.details', ['champion' => $champion]);
    }

    public function destroy(Champion $champion){
        $habilities = Hability::where('champion_id','=', $champion->id)->delete();
        $champ_users = DB::table('champion_user')->where('champion_id','=', $champion->id)->delete();
        $champion->delete();

        return redirect()->route('champions.list');
    }

    public function listAlphabetical(){
        $champions = Champion::orderBy('name', 'ASC')->paginate(18);
        return view('champions', compact('champions'));
    }
}
