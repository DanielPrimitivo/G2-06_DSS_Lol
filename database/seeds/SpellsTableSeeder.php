<?php

use Illuminate\Database\Seeder;
use App\Spell;

class SpellsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $info = parse_ini_file("spell.ini", true);
        foreach($info as $ru){
            $spell = new Spell([
                'name' => $ru['name'],
                'description' => $ru['description']
            ]);
            $spell->save();
        }
    }
}
