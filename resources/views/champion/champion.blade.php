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
		<br>
		@foreach($habilities as $hability)
			<img src="{{$hability->icon}}">
			<li>Nombre: {{$hability->name}}</li>
			<li>Descripción: {{$hability->description}}</li>
			<br>
		@endforeach
	</ul>

@endsection