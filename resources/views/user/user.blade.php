@extends('layout')

@section('title', "Usuario")

@section('content')

	<h1>Usuario</h1>

	<ul>
        <li>Nombre: {{$user->name}}</li>
	<li>E-mail: {{$user->email}}</li>
	<li>Tipo de usuario: {{$user->type}}</li>

	</ul>

@endsection