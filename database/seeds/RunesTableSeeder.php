<?php

use Illuminate\Database\Seeder;
use App\Rune;

class RunesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $info = parse_ini_file("rune.ini", true);
        foreach($info as $ru){
            $rune = new Rune([
                'name' => $ru['name'],
                'type' => $ru['type'],
                'row' => $ru['row'],
                'icon' => $ru['icon']
            ]);
            $rune->save();
        }
    }
}
