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
        $this->assertEquals($count, 3);

        $this->assertDatabaseHas('champions', ['name' => 'Azir']);
        $this->assertDatabaseHas('champions', ['name' => 'Olaf']);
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
        $this->assertEquals($count, 3);

        $this->assertDatabaseHas('habilities', ['name' => 'Lanzar hacha']);
        $this->assertDatabaseHas('habilities', ['name' => 'Soldados']);
        $this->assertDatabaseHas('habilities', ['name' => 'Furia']);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testHabilitiesByChampion()
    {
        $champion = Champion::where('name', 'Olaf')->first();
        $this->assertEquals($champion->habilities->count(), 2);
        $this->assertTrue($champion->habilities->contains('name', 'Lanzar hacha'));
        $this->assertTrue($champion->habilities->contains('name', 'Furia'));

        $champion = Champion::where('name', 'Azir')->first();
        $this->assertEquals($champion->habilities->count(), 1);
        $this->assertTrue($champion->habilities->contains('name', 'Soldados'));

        $champion = Champion::where('name', 'Ashe')->first();
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
        $this->assertTrue($user->champions->contains('name', 'Azir'));
        $this->assertTrue($user->champions->contains('name', 'Ashe'));

        $user = User::where('name', 'Isabel Gutierrez')->first();
        $this->assertEquals($user->champions->count(), 2);
        $this->assertTrue($user->champions->contains('name', 'Azir'));
        $this->assertTrue($user->champions->contains('name', 'Olaf'));
    }
}
