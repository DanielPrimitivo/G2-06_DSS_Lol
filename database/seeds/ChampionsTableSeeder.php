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
        foreach($info as $champ){
            $champion = new Champion([
                'name' => $champ['name'],
                'rol' => $champ['rol'],
                'title' => $champ['title'],
                'location' => $champ['location']
            ]);
            $champion->save();
        }
    }
}
