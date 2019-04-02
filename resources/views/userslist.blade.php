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
	<div class="row justify-content-center align-items-center space">
		@foreach ($users as $user)
			<div class="col-3"></div>
			<div class="col-4">
				<div class="features-icons-item mx-auto mb-2 mt-2">
					<a href="{{ route('user.details',['user' => $user])}}">{{ $user->name }}</a>
				</div>
			</div>
			<div class="col-1">
				<div class="features-icons-item mx-auto mb-2 mt-2">
					<form action="{{ route('user.destroy', $user) }}" method="POST">
						{{ method_field('DELETE') }}
						{{ csrf_field() }}
						<button type="submit" class="btn btn-danger">Eliminar</button>
					</form>
				</div>
			</div>
			<div class="col-3"></div>
		@endforeach
	</div>
	<div class="row justify-content-center align-items-center">
		<div class="col-4">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				{{ $users->links() }}
			</div>
		</div>
	</div>

@endsection