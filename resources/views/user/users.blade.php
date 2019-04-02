@extends('layout')

@section('title', "Usuarios")

@section('content')
	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
				<h1>Usuarios</h1>
			</div>
		</div>
	</div>

	<div class="row justify-content-center space">
		@foreach ($users as $user)
			<div class="col-lg-2 col-md-3 col-sm-4 col-5">
				<div class="features-icons-item mb-5 mb-lg-0 mb-lg-3">
					<a href="{{ route('user.details', $user) }}" class="lin">
						<div style="background: url('{{ $user->icon }}') no-repeat center center; background-size: cover" class="img2 d-flex"></div>
						<h3>{{ $user->name}}</h3>
					</a>
				</div>
			</div>
		@endforeach
	</div>
	<div class="row justify-content-center align-items-center">
		<div class="col-6">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				{{ $users->links() }}
			</div>
		</div>
	</div>

@endsection