<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ChampionsTableSeeder::class);
        $this->call(HabilitiesTableSeeder::class);
        $this->call(Champions_UsersTableSeeder::class);
        $this->call(ObjectsTableSeeder::class);
        $this->call(RunesTableSeeder::class);
        $this->call(SpellsTableSeeder::class);
    }
}
