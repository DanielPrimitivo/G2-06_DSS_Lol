@extends('layout')

@section('title', "Rune")

@section('content')

	<h1>Runa</h1>

	<ul>
        	<li>Nombre: {{$rune->name}}</li>
            <li>Tipo: {{$rune->type}}</li>
            <li>Fila: {{$rune->row}}</li>
	</ul>
	<div class="littlespace"></div>
	@guest
	@else
	<div class="row justify-content-center">
		<div class="col-lg-1 col-sm-2 col-3">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<a href="{{ route('rune.edit',['rune' => $rune])}}" class="btn btn-primary"> Editar</a>
			</div>
		</div>
		<div class="col-lg-1 col-sm-2 col-3">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<form action="{{ route('rune.destroy', $rune) }}" method="POST">
					{{ method_field('DELETE') }}
					{{ csrf_field() }}
					<button type="submit" class="btn btn-danger">Eliminar</button>
				</form>
			</div>
		</div>
	</div>
	@endguest
@endsection