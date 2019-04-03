@extends('layout')

@section('title', "Campeones")

@section('content')

	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<h1>Campeones</h1>
			</div>
		</div>
	</div>

	<div class="space"></div>

	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<a class="btn btn-success" href="{{ route('champion.create')}}">Nuevo campeón</a>
			</div>
		</div>
	</div>

	<div class="littlespace"></div>
	
	@foreach ($champions as $champion)
		<div class="row justify-content-center align-items-center">
			<div class="col-lg-4 col-sm-6 col-12">
				<div class="features-icons-item mx-auto mb-2 mt-2">
					<a href="{{ route('champion.details',['champion' => $champion])}}">{{ $champion->name }}, {{ $champion->title }}</a>
				</div>
			</div>
			<div class="col-lg-1 col-sm-2 col-3">
				<div class="features-icons-item mx-auto mb-2 mt-2">
					<a href="{{ route('champion.edit',['champion' => $champion])}}" class="btn btn-primary"> Editar</a>
				</div>
			</div>
			<div class="col-lg-1 col-sm-2 col-3">
				<div class="features-icons-item mx-auto mb-2 mt-2">
					<form action="{{ route('champion.destroy', $champion) }}" method="POST">
						{{ method_field('DELETE') }}
						{{ csrf_field() }}
						<button type="submit" class="btn btn-danger">Eliminar</button>
					</form>
				</div>
			</div>
		</div>
	@endforeach
	
	<div class="row justify-content-center align-items-center">
		<div class="col-4">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				{{ $champions->links() }}
			</div>
		</div>
	</div>

@endsection