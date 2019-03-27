@extends('layout')

@section('title', "Campeones")

@section('content')

	<h1>Campeones</h1>

	<ul>
		@foreach ($champions as $champion)
			<li>
				<a href="{{ route('champion.details',['champion' => $champion])}}">{{ $champion->name }}, {{ $champion->title }}</a>
			</li>
		@endforeach
	</ul>

@endsection