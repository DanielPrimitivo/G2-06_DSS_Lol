@extends('layout')

@section('title', "Usuario")

@section('content')

	<h1>Usuario</h1>

	<ul>
        <li>Nombre: {{$usu->name}}</li>
	<li>E-mail: {{$usu->email}}</li>
	<li>Tipo de usuario: {{$usu->type}}</li>

	</ul>

@endsection