<?php

use Illuminate\Database\Seeder;
use App\Object;

class ObjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $info = parse_ini_file("object.ini", true);
        foreach($info as $obj){
            $object = new Object([
                'name' => $obj['name'],
                'price' => $obj['price'],
                'description' => $obj['description'],
                'type' => $obj['type'],
                'subtype' => $obj['subtype'],
                'icon' => $obj['icon']
            ]);
            $object->save();
        }
    }
}
