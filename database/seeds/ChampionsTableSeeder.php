<?php

use Illuminate\Database\Seeder;
use App\Champion;
use App\Hability;

class ChampionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $info = parse_ini_file("champion.ini", true);
        $cont = 0;
        foreach($info as $champ){
            $champion = new Champion(['name' => $champ['name']]);
            $champion->save();
            /*$champion->habilities()->saveMany([
                new Hability(['name' => $cont])
            ]);*/
            //$cont++;
        }
        //habilidades
    }

    /*public function read_document(){
        $array_ini = parse_ini_file("champion.ini", true);
        //print_r($array_ini['name']);
        foreach($array_ini as $valor){
            //print_r($valor);
            echo $valor['name'];
        }
    }*/
}
