@extends('layout')

@section('title', "Habilidad")

@section('content')

	<h1>Habilidad</h1>

	<ul>
        <li>Nombre: {{$hability->name}}</li>
	<li>Descripción: {{$hability->description}}</li>
	
	<li>Campeón: {{$hability->champion_id}}</li>
	</ul>

@endsection