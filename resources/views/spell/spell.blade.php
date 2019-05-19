@extends('layout')

@section('title', "Hechizo")

@section('content')

	<h1>Hechizo</h1>

	<ul>
        	<li>Nombre: {{$spell->name}}</li>
            <li>Descripción: {{$spell->description}}</li>
	</ul>
	<div class="littlespace"></div>
	<div class="row justify-content-center">
		<div class="col-lg-1 col-sm-2 col-3">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<a href="{{ route('spell.edit',['spell' => $spell])}}" class="btn btn-primary"> Editar</a>
			</div>
		</div>
		<div class="col-lg-1 col-sm-2 col-3">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<form action="{{ route('spell.destroy', $spell) }}" method="POST">
					{{ method_field('DELETE') }}
					{{ csrf_field() }}
					<button type="submit" class="btn btn-danger">Eliminar</button>
				</form>
			</div>
		</div>
	</div>
@endsection