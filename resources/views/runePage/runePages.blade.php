@extends('layout')

@section('title', "Página de runas")

@section('content')
	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
				<h1>Página de runas</h1>
			</div>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<a class="btn btn-success" href="{{ route('pagrune.create')}}">Nueva página de runas</a>
			</div>
		</div>
	</div>
	<div class="row justify-content-center space">
		@foreach ($runePages as $runePage)
			<div class="col-lg-2 col-md-3 col-sm-4 col-5">
				<div class="features-icons-item mb-5 mb-lg-0 mb-lg-3">
					<a href="{{ route('pagrunes.details', $runePage) }}" class="lin">
						<div style="background: url('{{ $runePage->icon }}') no-repeat center center; background-size: cover" class="img2 d-flex"></div>
						<h3>{{ $runePage->name}}</h3>
					</a>
				</div>
			</div>
		@endforeach
	</div>
	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
				{{ $runePages->links() }}
			</div>
		</div>
	</div>

@endsection