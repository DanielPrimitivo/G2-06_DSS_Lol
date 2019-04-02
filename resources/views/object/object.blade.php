@extends('layout')

@section('title', "Objeto")

@section('content')

	<h1>Objeto</h1>

	<ul>
        	<li>Nombre: {{$object->name}}</li>
            <li>Precio: {{$object->price}}</li>
            <li>Descripcion: {{$object->description}}</li>
            <li>Tipo: {{$object->type}}</li>
            <li>Subtipo: {{$object->subtype}}</li>
	</ul>

@endsection