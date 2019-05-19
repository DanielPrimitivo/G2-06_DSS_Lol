@extends('layout')

@section('title', "Habilidad")

@section('content')

	<h1>Habilidad</h1>

	<ul>
		<img src="{{$hability->icon}}">
		<li>Nombre: {{$hability->name}}</li>
		<li>Descripción: {{$hability->description}}</li>
		<li>Campeón: {{$hability->champion_id}}</li>
	</ul>
	<div class="littlespace"></div>
	<div class="row justify-content-center">
		<div class="col-lg-1 col-sm-2 col-3">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<form action="{{ route('hability.destroy', $hability) }}" method="POST">
					{{ method_field('DELETE') }}
					{{ csrf_field() }}
					<button type="submit" class="btn btn-danger">Eliminar</button>
				</form>
			</div>
		</div>
	</div>
@endsection