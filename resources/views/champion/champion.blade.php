@extends('layout')

@section('title', "Campeon")

@section('content')

	<h1>Campeon</h1>

	<ul>
        	<li>Nombre campeon {{$champion->name}}</li>
	</ul>

@endsection