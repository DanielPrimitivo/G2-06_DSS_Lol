@extends('layout')

@section('title', "Campeon")

@section('content')

	<h1>Campeon</h1>

	<ul>
		<img src="{{$champion->icon}}">
        <li>Nombre: {{$champion->name}}</li>
		<li>Rol: {{$champion->rol}}</li>
		<li>Titulo: {{$champion->title}}</li>
		<li>Localizacion: {{$champion->location}}</li>
		<br>
		@foreach($habilities as $hability)
			<img src="{{$hability->icon}}">
			<li>Nombre: {{$hability->name}}</li>
			<li>Descripción: {{$hability->description}}</li>
			<br>
		@endforeach
	</ul>
	<div class="littlespace"></div>
	@guest
	@else
	<div class="row justify-content-center">
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
	@endguest
@endsection