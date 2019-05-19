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
			<div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
				<h3>{{$runePage->name}}</h3>
			</div>
		</div>
	</div>

@endsection