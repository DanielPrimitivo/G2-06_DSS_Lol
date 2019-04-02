@extends('layout')

@section('title', "Rune")

@section('content')

	<h1>Runa</h1>

	<ul>
        	<li>Nombre: {{$rune->name}}</li>
            <li>Tipo: {{$rune->type}}</li>
            <li>Fila: {{$rune->row}}</li>
	</ul>

@endsection