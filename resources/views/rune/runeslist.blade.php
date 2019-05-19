@extends('layout')

@section('title', "Runas")

@section('content')

	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<h1>Runas</h1>
			</div>
		</div>
	</div>

	<div class="space"></div>

	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<a class="btn btn-success" href="{{ route('rune.create')}}">Nueva runa</a>
			</div>
		</div>
	</div>

	<div class="littlespace"></div>
	<div class="row justify-content-center littlespace">
		@foreach ($runes as $rune)
			<div class="col-lg-2 col-md-3 col-sm-4 col-5">
				<div class="features-icons-item mb-5 mb-lg-0 mb-lg-3">
					<a href="{{ route('rune.details', $rune) }}" class="lin">
						<div style="background: url('{{ $rune->icon }}') no-repeat center center; background-size: cover" class="img2 d-flex"></div>
						<h3>{{ $rune->name}}</h3>
					</a>
				</div>
			</div>
		@endforeach
	</div>
	
	<div class="row justify-content-center align-items-center space">
		<div class="col-4">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				{{ $runes->links() }}
			</div>
		</div>
	</div>

@endsection