<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Champion;
use App\Hability;

class DataTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testUserData()
    {
        $count = User::all()->count();
        $this->assertEquals($count, 5);

        $this->assertDatabaseHas('users', ['name' => 'Enrique Miguel Juan Fuster']);
        $this->assertDatabaseHas('users', ['name' => 'Daniel Primitivo Cano']);
        $this->assertDatabaseHas('users', ['name' => 'Francisco Garcia Mora']);
        $this->assertDatabaseHas('users', ['name' => 'Isabel Gutierrez']);
        $this->assertDatabaseHas('users', ['name' => 'Miguel Sanchez']);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testChampionData()
    {
        $count = Champion::all()->count();
        $this->assertEquals($count, 30);

        $this->assertDatabaseHas('champions', ['name' => 'Azir']);
        $this->assertDatabaseHas('champions', ['name' => 'Fizz']);
        $this->assertDatabaseHas('champions', ['name' => 'Ashe']);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testHabilityData()
    {
        $count = Hability::all()->count();
        $this->assertEquals($count, 50);

        $this->assertDatabaseHas('habilities', ['name' => 'Testarazo']);
        $this->assertDatabaseHas('habilities', ['name' => 'Pisotear']);
        $this->assertDatabaseHas('habilities', ['name' => 'Tormenta glacial']);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testHabilitiesByChampion()
    {
        $champion = Champion::where('name', 'Ashe')->first();
        $this->assertEquals($champion->habilities->count(), 5);
        $this->assertTrue($champion->habilities->contains('name', 'Tiro congelador'));
        $this->assertTrue($champion->habilities->contains('name', 'Flecha de cristal encantada'));

        $champion = Champion::where('name', 'Azir')->first();
        $this->assertEquals($champion->habilities->count(), 5);
        $this->assertTrue($champion->habilities->contains('name', 'Legado de Shurima'));
        $this->assertTrue($champion->habilities->contains('name', 'Arenas conquistadoras'));
        $this->assertTrue($champion->habilities->contains('name', 'Alzaos'));
        $this->assertTrue($champion->habilities->contains('name', 'Arenas movedizas'));
        $this->assertTrue($champion->habilities->contains('name', 'Falange imperial'));

        $champion = Champion::where('name', 'Dr. Mundo')->first();
        $this->assertEquals($champion->habilities->count(), 0);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testChampionsByUser()
    {
        $user = User::where('name', 'Enrique Miguel Juan Fuster')->first();
        $this->assertEquals($user->champions->count(), 2);
        $this->assertTrue($user->champions->contains('name', 'Aatrox'));
        $this->assertTrue($user->champions->contains('name', 'Akali'));

        $user = User::where('name', 'Isabel Gutierrez')->first();
        $this->assertEquals($user->champions->count(), 2);
        $this->assertTrue($user->champions->contains('name', 'Aatrox'));
        $this->assertTrue($user->champions->contains('name', 'Ahri'));
    }
}
