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
	<div class="row justify-content-center littlespace">
		@foreach ($habilities as $hability)
			<div class="col-lg-2 col-md-3 col-sm-4 col-5">
				<div class="features-icons-item mb-5 mb-lg-0 mb-lg-3">
					<a href="{{ route('hability.details', $hability) }}" class="lin">
						<div style="background: url('{{ $hability->icon }}') no-repeat center center; background-size: cover" class="img2 d-flex"></div>
						<h3>{{ $hability->name}}</h3>
					</a>
				</div>
			</div>
		@endforeach
	</div>
	
	<div class="row justify-content-center align-items-center">
		<div class="col-lg-4">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				{{ $habilities->links() }}
			</div>
		</div>
	</div>

@endsection