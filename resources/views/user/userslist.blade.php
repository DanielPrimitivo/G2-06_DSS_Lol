@extends('layout')

@section('title', "Usuarios")

@section('content')

	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<h1>Usuarios</h1>
			</div>
		</div>
	</div>
	<div class="space"></div>
	
	@foreach ($users as $user)
		<div class="row justify-content-center align-items-center">
			<div class="col-lg-4 col-sm-6 col-12">
				<div class="features-icons-item mx-auto mb-2 mt-2">
					<a href="{{ route('user.details',['user' => $user->id])}}">{{ $user->name }}</a>
				</div>
			</div>
			<div class="col-lg-1 col-sm-2 col-3">
				<div class="features-icons-item mx-auto mb-2 mt-2">
					<form action="{{ route('user.destroy', $user->id) }}" method="POST">
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
				{{ $users->links() }}
			</div>
		</div>
	</div>

@endsection