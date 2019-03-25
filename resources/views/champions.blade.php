@extends('layout')

@section('title', "Campeones")

@section('content')

	<h1>Campeones</h1>

	<ul>
		@foreach ($champions as $champion)
			<li>{{ $champion->name }}</li>
		@endforeach
	</ul>

@endsection