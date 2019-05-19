@extends('layout')

@section('title', "Build")

@section('content')

	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
				<h1>Build</h1>
			</div>
		</div>
	</div>
	<div class="littlespace"></div>
	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
				<h2>{{$build->name}}</h2>
			</div>
		</div>
	</div>
	<div class="row justify-content-center littlespace">
		<div class="col-lg-2 col-md-3 col-sm-4 col-5">
			<div class="features-icons-item mb-5 mb-lg-0 mb-lg-3">
			<a href="{{ route('champion.details', $champion) }}" class="lin">
				<div style="background: url('{{ $champion->icon }}') no-repeat center center; background-size: cover" class="img2 d-flex"></div>
					<h3>{{ $champion->name}}</h3>
			</a>
			</div>
		</div>
		@foreach ($spells as $spell)
			<div class="col-lg-2 col-md-3 col-sm-4 col-5">
				<div class="features-icons-item mb-5 mb-lg-0 mb-lg-3">
				<a href="{{ route('spell.details', $spell) }}" class="lin">
					<div style="background: url('{{ $spell->icon }}') no-repeat center center; background-size: cover" class="img2 d-flex"></div>
						<h3>{{ $spell->name}}</h3>
				</a>
				</div>
			</div>
		@endforeach
		<div class="col-lg-2 col-md-3 col-sm-4 col-5">
			<div class="features-icons-item mb-5 mb-lg-0 mb-lg-3">
			<a href="{{ route('pagrunes.details', $runesPage) }}" class="lin">
				<div style="background: url('{{ $runesPage->icon }}') no-repeat center center; background-size: cover" class="img2 d-flex"></div>
					<h3>{{ $runesPage->name}}</h3>
			</a>
			</div>
		</div>
	</div>
	<div class="row justify-content-center littlespace">
		@foreach ($objects as $object)
			<div class="col-lg-2 col-md-3 col-sm-4 col-5">
				<div class="features-icons-item mb-5 mb-lg-0 mb-lg-3">
				<a href="{{ route('object.details', $object) }}" class="lin">
					<div style="background: url('{{ $object->icon }}') no-repeat center center; background-size: cover" class="img2 d-flex"></div>
						<h3>{{ $object->name}}</h3>
				</a>
				</div>
			</div>
		@endforeach
	</div>
	<div class="littlespace"></div>
	@if (Auth::check())
		@if (Auth::user()->type == "Usuario")
		@else
	<div class="row justify-content-center">
		<div class="col-lg-1 col-sm-2 col-3">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<a href="{{ route('build.edit',['build' => $build])}}" class="btn btn-primary"> Editar</a>
			</div>
		</div>
		<div class="col-lg-1 col-sm-2 col-3">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<form action="{{ route('build.destroy', $build) }}" method="POST">
					{{ method_field('DELETE') }}
					{{ csrf_field() }}
					<button type="submit" class="btn btn-danger">Eliminar</button>
				</form>
			</div>
		</div>
	</div>
	@endif
	@endif

@endsection