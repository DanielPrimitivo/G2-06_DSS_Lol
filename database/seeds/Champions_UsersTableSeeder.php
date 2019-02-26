<?php

use Illuminate\Database\Seeder;
use App\Champion;
use App\User;

class Champions_UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::find(1);
        $user2 = User::find(4);

        $champ1 = Champion::find(1);
        $champ2 = Champion::find(2);
        $champ3 = Champion::find(3);

        $user1->champions()->attach($champ1->id);
        $user1->champions()->attach($champ3->id);
        $user2->champions()->attach($champ2->id);
        $user2->champions()->attach($champ1->id);
    }
}
