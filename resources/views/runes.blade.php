@extends('layout')

@section('title', "Runas")

@section('content')
	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
				<h1>Runas</h1>
			</div>
		</div>
	</div>
	<div class="row justify-content-center space">
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

@endsection