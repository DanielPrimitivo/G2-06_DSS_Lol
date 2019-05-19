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
	<div class="littlespace"></div>
	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
				<h2>{{$runePage->name}}</h2>
			</div>
		</div>
	</div>
	<div class="littlespace"></div>
	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
				<h3>{{$t1}}</h3>
			</div>
		</div>
	</div>
	<div class="row justify-content-center littlespace">
		@foreach ($runesPrimary as $runePri)
			<div class="col-lg-2 col-md-3 col-sm-4 col-5">
				<div class="features-icons-item mb-5 mb-lg-0 mb-lg-3">
				<a href="{{ route('rune.details', $runePri) }}" class="lin">
					<div style="background: url('{{ $runePri->icon }}') no-repeat center center; background-size: cover" class="img2 d-flex"></div>
						<h3>{{ $runePri->name}}</h3>
				</a>
				</div>
			</div>
		@endforeach
	</div>
	<div class="littlespace"></div>
	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
				<h3>{{$t2}}</h3>
			</div>
		</div>
	</div>
	<div class="row justify-content-center littlespace">
		@foreach ($runesSecundary as $runeSec)
			<div class="col-lg-2 col-md-3 col-sm-4 col-5">
				<div class="features-icons-item mb-5 mb-lg-0 mb-lg-3">
				<a href="{{ route('rune.details', $runeSec) }}" class="lin">
					<div style="background: url('{{ $runeSec->icon }}') no-repeat center center; background-size: cover" class="img2 d-flex"></div>
						<h3>{{ $runeSec->name}}</h3>
				</a>	
				</div>
			</div>
		@endforeach
	</div>
	<div class="littlespace"></div>
	@guest
	@else
	<div class="row justify-content-center">
		<div class="col-lg-1 col-sm-2 col-3">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<a href="{{ route('pagrune.edit',['runePage' => $runePage])}}" class="btn btn-primary"> Editar</a>
			</div>
		</div>
		<div class="col-lg-1 col-sm-2 col-3">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<form action="{{ route('pagrune.destroy', $runePage) }}" method="POST">
					{{ method_field('DELETE') }}
					{{ csrf_field() }}
					<button type="submit" class="btn btn-danger">Eliminar</button>
				</form>
			</div>
		</div>
	</div>
	@endguest

@endsection