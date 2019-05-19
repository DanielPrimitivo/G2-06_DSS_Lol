@extends('layout')

@section('title', "Objeto")

@section('content')

	<h1>Objeto</h1>

	<ul>
        	<li>Nombre: {{$object->name}}</li>
            <li>Precio: {{$object->price}}</li>
            <li>Descripcion: {{$object->description}}</li>
            <li>Tipo: {{$object->type}}</li>
            <li>Subtipo: {{$object->subtype}}</li>
	</ul>
	<div class="littlespace"></div>
	@guest
	@else
	<div class="row justify-content-center">
		<div class="col-lg-1 col-sm-2 col-3">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<a href="{{ route('object.edit',['object' => $object])}}" class="btn btn-primary"> Editar</a>
			</div>
		</div>
		<div class="col-lg-1 col-sm-2 col-3">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<form action="{{ route('object.destroy', $object) }}" method="POST">
					{{ method_field('DELETE') }}
					{{ csrf_field() }}
					<button type="submit" class="btn btn-danger">Eliminar</button>
				</form>
			</div>
		</div>
	</div>
	@endguest
@endsection