@extends('layout')

@section('title', "Objetos")

@section('content')

	<h1>Objetos</h1>

	<ul>
		@foreach ($objects as $object)
			<li>{{ $object->name }}</li>
		@endforeach
	</ul>

@endsection