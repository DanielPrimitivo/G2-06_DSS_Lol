@extends('layout')

@section('title', "Usuario")

@section('content')

	<h1>Usuario</h1>

	<ul>
        <li>Nombre: {{$usu->name}}</li>
	<li>E-mail: {{$usu->email}}</li>
	<li>Tipo de usuario: {{$usu->type}}</li>

	</ul>
	<div class="littlespace"></div>
	@guest
	@else
	<div class="row justify-content-center">
		<div class="col-lg-1 col-sm-2 col-3">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<form action="{{ route('user.destroy', $usu) }}" method="POST">
					{{ method_field('DELETE') }}
					{{ csrf_field() }}
					<button type="submit" class="btn btn-danger">Eliminar</button>
				</form>
			</div>
		</div>
	</div>
	@guest
@endsection