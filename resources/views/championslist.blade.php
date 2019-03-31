@extends('layout')

@section('title', "Campeones")

@section('content')
	<p>
		<a href="{{ route('champion.create')}}">Nuevo campeón</a>
	</p>

	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<h1>Campeones</h1>
			</div>
		</div>
	</div>
	<div class="row justify-content-center align-items-center space">
		@foreach ($champions as $champion)
			<div class="col-3"></div>
			<div class="col-4">
				<div class="features-icons-item mx-auto mb-2 mt-2">
					<a href="{{ route('champion.details',['champion' => $champion])}}">{{ $champion->name }}, {{ $champion->title }}</a>
				</div>
			</div>
			<div class="col-1">
				<div class="features-icons-item mx-auto mb-2 mt-2">
					<a href="{{ route('champion.edit',['champion' => $champion])}}" class="btn btn-primary"> Editar</a>
				</div>
			</div>
			<div class="col-1">
				<div class="features-icons-item mx-auto mb-2 mt-2">
					<form action="{{ route('champion.destroy', $champion) }}" method="POST">
						{{ method_field('DELETE') }}
						{{ csrf_field() }}
						<button type="submit" class="btn btn-danger">Eliminar</button>
					</form>
				</div>
			</div>
			<div class="col-3"></div>
		@endforeach
	</div>
	<div class="row justify-content-center align-items-center space">
		<div class="col-4">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				{{ $champions->links() }}
			</div>
		</div>
	</div>

@endsection