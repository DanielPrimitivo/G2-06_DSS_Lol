<?php
namespace App\Services;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Build;

class ChampionFavorite{
    public static function createBuild($name, $user, $champion, $pag_rune, $spells, $objects){
        $rollback = false;
        DB::beginTransaction();
        try {
            $data = array('name' => $name,
                'champion_id' => $champion,
                'page_rune_id' => $pag_rune,
                'object_id1' => $objects[0],
                'object_id2' => $objects[1],
                'object_id3' => $objects[2],
                'object_id4' => $objects[3],
                'object_id5' => $objects[4],
                'object_id6' => $objects[5],
                'spell_id1' => $spells[0],
                'spell_id2' => $spells[1]
            );
            
            if(DB::table('champion_user')->where('champion_id', '=', $champion, 'and', 'user_id', '=', $user)->count() == 0){
                DB::table('champion_user')->insert([
                    'champion_id' => $champion,
                    'user_id' => $user
                ]);
            }
                    
            Build::crear($data);
        }catch(Exception $e){
            dd("exception");
            $rollback = true;
        }finally{
            if($rollback){
                DB::rollback();
                return redirect()->route('home');
            }else{
                DB::commit();
                return redirect()->route('builds');
            }
        }
    }
}