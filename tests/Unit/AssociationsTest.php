<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Champion;
use App\Hability;

class AssociationsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testAssociationChampionHability()
    {
        $champion = new Champion();
        $champion->name = 'Tryndamere';
        $champion->save();

        $hability = new Hability();
        $hability->name = 'Infinito';
        $champion->habilities()->save($hability);

        $this->assertEquals($hability->champion->name, 'Tryndamere');
        $this->assertEquals($champion->habilities[0]->name, 'Infinito');

        $hability->delete();
        $champion->delete();
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testAssociationChampionUser()
    {
        $champion = new Champion();
        $champion->name = 'Tryndamere';
        $champion->save();

        $hability = new Hability();
        $hability->name = 'Infinito';
        $champion->habilities()->save($hability);

        $user = new User();
        $user->name = 'Juanito';
        $user->email = 'juanito@gmail.com';
        $user->email_verified_at = 'juanito@gmail.com';
        $user->type = 'Usuario';
        $user->password = 'juanito123';
        $user->save();
        $user->champions()->attach($champion->id);


        $this->assertEquals($user->champions[0]->name, 'Tryndamere');
        $this->assertEquals($champion->users[0]->name, 'Juanito');

        $user->champions()->detach($champion->id);
        $user->delete();
        $hability->delete();
        $champion->delete();
    }
}
