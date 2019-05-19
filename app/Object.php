<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Object extends Model
{
    public function builds(){
        return $this->belongsToMany('App\Build');
    }

    protected $fillable = array('name', 'price', 'description', 'type', 'subtype');

    public static function crear(array $data){
        $object = new Object();
        $object->name = $data['name'];
        $object->price = $data['price'];
        $object->description = $data['description'];
        $object->type = $data['type'];
        $object->subtype = $data['subtype'];
        $object->save();
        return redirect()->route('objects');
    }

    public static function actualizar(array $data, Object $object){
        $object->update($data);
        return redirect()->route('object.details', ['object' => $object]);
    }

    public static function PagCrear(){
        return view('object.objectcreate');
    }

    public static function eliminar(Object $object){
        $buildObjects = DB::table('build_object')->where('object_id', '=', $object->id)->get();
        $antID = -1;
        foreach($buildObjects as $buildObject){
            $buildID = $buildObject->build_id;
            if($buildID != $antID){
                Build::find($buildID)->delete();
                $antID = $buildID;
            }
        }
        $object->delete();
        return redirect()->route('objects.list');
    }

    public static function listaUserAdmin(){
        $objects = Object::paginate(12);
        return view('object.objectslist', compact('objects'));
    }

    private static function arrayType(){
        $allObjects = Object::all();
        $types = [];
        foreach($allObjects as $object){
            $types[$object->type] = $object->type;
        }
        return $types;
    }

    private static function arraySubtype(){
        $allObjects = Object::all();
        $subtypes = [];
        foreach($allObjects as $object){
            $subtypes[$object->subtype] = $object->subtype;
        }
        return $subtypes;
    }

    public static function listaUserNormal(){
        $object = new Object();
        $objects = Object::paginate(12);
        $types = $object->arrayType();
        $subtypes = $object->arraySubtype();
        $type = $subtype = 'Ninguno';
        return view('object.objects', compact('objects', 'types', 'subtypes', 'type', 'subtype'));
    }

    public static function listaUserNormalOrderByType($type){
        $object = new Object();
        $types = $object->arrayType();
        $subtypes = $object->arraySubtype();
        $objects = Object::where('type', '=', $type)->paginate(12);
        $subtype = 'Ninguno';
        return view('object.objects', compact('objects', 'types', 'subtypes', 'type', 'subtype'));
    }

    public static function listaUserNormalOrderBySubtype($subtype){
        $object = new Object();
        $types = $object->arrayType();
        $subtypes = $object->arraySubtype();
        $objects = Object::where('subtype', '=', $subtype)->paginate(12);
        $type = 'Ninguno';
        return view('object.objects', compact('objects', 'types', 'subtypes', 'type', 'subtype'));
    }

    public static function listaUserNormalOrderByTwo($type, $subtype){
        $object = new Object();
        $types = $object->arrayType();
        $subtypes = $object->arraySubtype();
        $objects = Object::where('subtype', '=', $subtype)->where('type', '=', $type)->paginate(12);
        return view('object.objects', compact('objects', 'types', 'subtypes', 'type', 'subtype'));
    }

    public static function informacionIndividual(Object $object){
        return view('object.object', compact('object'));
    }

    public static function editarInfo(Object $object){
        return view('object.objectedit', compact('object'));
    }
}
