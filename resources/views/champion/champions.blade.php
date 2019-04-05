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
	<div class="row justify-content-center align-items-center space">
        <div class="col-sm-6 col-lg-3">	
			<form method="GET" action="{{ route('champions') }}">
				<div class="form-group row align-items-center ">
					<div class="col-sm-2 col-lg-3">
						<input class="form-check-checkbox" type="checkbox" id="order" name="order" {{ $check }}>
					</div>
					<div class="col-sm-10 col-lg-3">
						<input class="btn btn-primary" type="submit" value="Ordenar alfabeticamente">
					</div>
				</div>
			</form>
		</div>
	</div>
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
		<div class="col-6">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				{{ $champions->links() }}
			</div>
		</div>
	</div>

@endsection