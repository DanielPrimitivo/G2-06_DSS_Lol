<?php
namespace App\Services;
use Illuminate\Support\Facades\DB;

class ChampionFavorite{
    public static function createBuild($user, $champion, $pag_rune, $spells, $objects){
        $rollback = false;
        DB::beginTransaction();
        try {
            $champion_name = Champion::find($champion)->$name;
            $data = array(
                'champion_name' => $champion_name,
                'pag_rune' => $pag_rune,
                'object1' => $objects[0],
                'object2' => $objects[1],
                'object3' => $objects[2],
                'object4' => $objects[3],
                'object5' => $objects[4],
                'object6' => $objects[5],
                'spell1' => $spells[0],
                'spell2' => $spells[1],
                'user' => $user
            );
            $build = Build::crear($data);
            if(DB::table('champion_user')->where('champion_id', '=', $champion, 'and', 'user_id', '=', $user)->count() == 0){
                DB::table('champion_user')->insert([
                    'champion_id' => $champion,
                    'user_id' => $user
                ]);
            }
        }catch(Exception $e){
            $rollback = true;
        }finally{
            if($rollback){
                DB::rollback();
                return null;
            }else{
                DB::commit();
                return true;
            }
        }
    }
}