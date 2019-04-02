@extends('layout')

@section('title', "Campeones")

@section('content')
	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
				<h1>Campeones</h1>
			</div>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
				<div class="form-check">
					<form method="GET" action="{{ route('champions') }}">
					<input class="form-check-checkbox" type="checkbox" id="order" name="order" {{ $check }}>
						<input class="form-check-button" type="submit" value="Ordenar alfabeticamente">
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row justify-content-center space">
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
		<div class="col-6">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				{{ $champions->links() }}
			</div>
		</div>
	</div>

@endsection