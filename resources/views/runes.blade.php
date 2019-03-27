@extends('layout')

@section('title', "Runas")

@section('content')

	<h1>Runas</h1>

	<ul>
		@foreach ($runes as $rune)
			<li>{{ $rune->name }}</li>
		@endforeach
	</ul>

@endsection