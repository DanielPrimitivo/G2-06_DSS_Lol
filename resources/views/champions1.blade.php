@extends('layout')

@section('title', "Campeones")

@section('content')

	<h1>Campeones</h1>

	<p>
		<a href="{{ route('champion.create')}}">Nuevo campeón</a>
	</p>

	<ul>
		@foreach ($champions as $champion)
			<li>
				<a href="{{ route('champion.details',['champion' => $champion])}}">{{ $champion->name }}, {{ $champion->title }}</a>
				<a href="{{ route('champion.edit',['champion' => $champion])}}"> Editar campeon </a>
				<form action="{{ route('champion.destroy', $champion) }}" method="POST">
					{{ method_field('DELETE') }}
					{{ csrf_field() }}
					<button type=submit>Eliminar</button>
				</form>
			</li>
		@endforeach
	</ul>

@endsection