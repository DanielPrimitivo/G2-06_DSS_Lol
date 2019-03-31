<?php

use Illuminate\Database\Seeder;
use App\Hability;
use App\Champion;

class HabilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $info = parse_ini_file("hability.ini", true);
        foreach($info as $hab){
            $name_champ = $hab['name_champion'];
            $champ = Champion::where('name', '=', $name_champ)->first();
            $hability = new Hability([
                'name' => $hab['name'],
                'description' => $hab['description'],
                'champion_id' => $champ->id,
                'icon' => $hab['icon']
            ]);
            $hability->save();
        }
    }
}
