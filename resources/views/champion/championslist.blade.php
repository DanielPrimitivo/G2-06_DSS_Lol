@extends('layout')

@section('title', "Campeones")

@section('content')

	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<h1>Campeones</h1>
			</div>
		</div>
	</div>

	<div class="space"></div>

	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<a class="btn btn-success" href="{{ route('champion.create')}}">Nuevo campeón</a>
			</div>
		</div>
	</div>

	<div class="littlespace"></div>
	<div class="row justify-content-center littlespace">
		@foreach ($champions as $champion)
			<div class="col-lg-2 col-md-3 col-sm-4 col-5">
				<div class="features-icons-item mb-5 mb-lg-0 mb-lg-3">
					<a href="{{ route('champion.details', $champion) }}" class="lin">
						<div style="background: url('{{ $champion->icon }}') no-repeat center center; background-size: cover" class="img2 d-flex"></div>
						<h3>{{ $champion->name}}</h3>
					</a>
				</div>
			</div>
		@endforeach
	</div>
	
	<div class="row justify-content-center align-items-center">
		<div class="col-4">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				{{ $champions->links() }}
			</div>
		</div>
	</div>

@endsection