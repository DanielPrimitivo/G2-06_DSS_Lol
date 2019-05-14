<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $info = parse_ini_file("user.ini", true);
        foreach($info as $us){
            $user = new User([
                'name' => $us['name'],
                'email' => $us['email'],
                'email_verified_at' => $us['email'],
                'password' => bcrypt($us['password']),
                'type' => $us['type']
            ]);
            $user->save();
        }
    }
}
