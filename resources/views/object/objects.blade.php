@extends('layout')

@section('title', "Objetos")

@section('content')
	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
				<h1>Objetos</h1>
			</div>
		</div>
	</div>
	<form method="GET" action="{{ route('objects') }}">
		<label for="type">Elige el tipo:</label>
		<select name="type" id="type">
			@if($type == 'Ninguno')
				<option value="Ninguno" selected>Ninguno</option>
			@else
				<option value="Ninguno">Ninguno</option>
			@endif
			@foreach ($types as $t)
				@if($type == $t)
					<option value="{{$t}}" selected>{{$t}}</option>
				@else
					<option value="{{$t}}">{{$t}}</option>
				@endif
			@endforeach
		</select>
		<label for="subtype">Elige el subtipo:</label>
		<select name="subtype" id="subtype">
			@if($type == 'Ninguno')
				<option value="Ninguno" selected>Ninguno</option>
			@else
				<option value="Ninguno">Ninguno</option>
			@endif
			@foreach ($subtypes as $st)
				@if($subtype == $st)
					<option value="{{$st}}" selected>{{$st}}</option>
				@else
					<option value="{{$st}}">{{$st}}</option>
				@endif
			@endforeach
		</select>
		<input class="btn btn-primary" type="submit" value="Buscar">
	</form>
	<div class="row justify-content-center space">
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
	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
				{{ $objects->links() }}
			</div>
		</div>
	</div>

@endsection