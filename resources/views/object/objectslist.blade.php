@extends('layout')

@section('title', "Objetos")

@section('content')

	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<h1>Objetos</h1>
			</div>
		</div>
	</div>

	<div class="space"></div>

	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<a class="btn btn-success" href="{{ route('object.create')}}">Nuevo objeto</a>
			</div>
		</div>
	</div>

	<div class="littlespace"></div>
	
	@foreach ($objects as $object)
		<div class="row justify-content-center align-items-center">
			<div class="col-lg-4 col-sm-6 col-12">
				<div class="features-icons-item mx-auto mb-2 mt-2">
					<a href="{{ route('object.details',['object' => $object])}}">{{ $object->name }}</a>
				</div>
			</div>
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
	@endforeach
	
	<div class="row justify-content-center align-items-center space">
		<div class="col-4">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				{{ $objects->links() }}
			</div>
		</div>
	</div>

@endsection