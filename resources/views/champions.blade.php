@extends('layout')

@section('title', "Campeones")

@section('content')
	<div class="row">
		<div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
			<h1>Campeones</h1>
		</div>
	</div>
	<div class="row">
		@foreach ($champions as $champion)
			<div class="col-lg-2 col-sm-3 col-4">
				<div class="features-icons-item mb-5 mb-lg-0 mb-lg-3">
					<a href="{{ route('champion.details', $champion) }}" class="lin">
						<div style="background: url('{{ $champion->icon }}') no-repeat center center" class="img2 d-flex"></div>
						<h3>{{ $champion->name}}</h3>
					</a>
				</div>
			</div>
		@endforeach
	</div>

@endsection