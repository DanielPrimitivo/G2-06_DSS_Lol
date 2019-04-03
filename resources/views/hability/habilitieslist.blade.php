@extends('layout')

@section('title', "Habilidades")

@section('content')
	<!--<p>
		<a href="{{ route('hability.create')}}">Nueva habilidad</a>
	</p>-->

	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<h1>Habilidades</h1>
			</div>
		</div>
	</div>
	<div class="space"></div>
	
	@foreach ($habilities as $hability)
		<div class="row justify-content-center align-items-center">
			<div class="col-lg-4 col-md-6 col-12">
				<div class="features-icons-item mx-auto mb-2 mt-2">
					<a href="{{ route('hability.details',['hability' => $hability])}}">{{ $hability->name }}</a>
				</div>
			</div>
			<!--<div class="col-1">
				<div class="features-icons-item mx-auto mb-2 mt-2">
					<a href="{{ route('hability.edit',['hability' => $hability])}}" class="btn btn-primary"> Editar</a>
				</div>
			</div>-->
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
	@endforeach
	
	<div class="row justify-content-center align-items-center">
		<div class="col-lg-4">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				{{ $habilities->links() }}
			</div>
		</div>
	</div>

@endsection