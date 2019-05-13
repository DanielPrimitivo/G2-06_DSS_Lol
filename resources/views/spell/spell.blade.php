@extends('layout')

@section('title', "Hechizo")

@section('content')

	<h1>Hechizo</h1>

	<ul>
        	<li>Nombre: {{$spell->name}}</li>
            <li>Descripción: {{$spell->description}}</li>
	</ul>

@endsection