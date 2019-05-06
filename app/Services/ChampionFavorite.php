<?php
namespace App\Services;
use Illuminate\Support\Facades\DB;

class ChampionFavorite{
    public static function createBuild($user, $champion, $pag_rune, $spells, $objects){
        $rollback = false;
        DB::beginTransaction();
        $champion_name = Champion::find($champion)->$name;

        $data = array(
            'champion_name' => $champion,
            'pag_rune' => $pag_rune
        );
        
        $build = Build::crear();
    }
}