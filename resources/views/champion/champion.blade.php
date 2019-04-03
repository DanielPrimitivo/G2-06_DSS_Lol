@extends('layout')

@section('title', "Campeon")

@section('content')

	<h1>Campeon</h1>

	<ul>
			<img src="{{$champion->icon}}">
        	<li>Nombre: {{$champion->name}}</li>
			<li>Rol: {{$champion->rol}}</li>
			<li>Titulo: {{$champion->title}}</li>
			<li>Localizacion: {{$champion->location}}</li>
	</ul>

@endsection