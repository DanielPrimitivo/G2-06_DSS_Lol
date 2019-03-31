@extends('layout')

@section('title', "Runas")

@section('content')
	<p>
		<a href="{{ route('object.create')}}">Nueva runa</a>
	</p>

	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<h1>Runas</h1>
			</div>
		</div>
	</div>
	<div class="row justify-content-center align-items-center space">
		@foreach ($runes as $rune)
			<div class="col-3"></div>
			<div class="col-4">
				<div class="features-icons-item mx-auto mb-2 mt-2">
					<a href="{{ route('rune.details',['rune' => $rune])}}">{{ $rune->name }}</a>
				</div>
			</div>
			<div class="col-1">
				<div class="features-icons-item mx-auto mb-2 mt-2">
					<a href="{{ route('rune.edit',['rune' => $rune])}}" class="btn btn-primary"> Editar</a>
				</div>
			</div>
			<div class="col-1">
				<div class="features-icons-item mx-auto mb-2 mt-2">
					<form action="{{ route('rune.destroy', $rune) }}" method="POST">
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
				{{ $runes->links() }}
			</div>
		</div>
	</div>

@endsection