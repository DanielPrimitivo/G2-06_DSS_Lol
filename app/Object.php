<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Object extends Model
{
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
        $object->delete();
        return redirect()->route('objects.list');
    }

    public static function listaUserAdmin(){
        $objects = Object::paginate(20);
        return view('object.objectslist', compact('objects'));
    }

    public static function listaUserNormal(){
        $objects = Object::paginate(12);
        return view('object.objects', compact('objects'));
    }

    public static function informacionIndividual(Object $object){
        return view('object.object', compact('object'));
    }

    public static function ordenarAlfabeticamente(){
        $objects = Object::orderBy('name', 'ASC')->paginate(12);
        return view('object.objects', compact('objects'));
    }

    public static function editarInfo(Object $object){
        return view('object.objectedit', compact('object'));
    }
}
