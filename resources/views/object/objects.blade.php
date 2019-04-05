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
	<div class="row justify-content-center align-items-center space">
        <div class="col-md-12 col-lg-12">
			<form method="GET" action="{{ route('objects') }}">
				<div class="form-group row">
					<label for="type" class="col-sm-2 col-form-label falign">Elige el tipo</label>
					<div class="col-sm-3">
						<select name="type" id="type" class="form-control">
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
					</div>
					<label for="subtype" class="col-sm-2 col-form-label falign">Elige el subtipo</label>
					<div class="col-sm-3">
						<select name="subtype" id="subtype" class="form-control">
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
					</div>
					<div class="col-sm-2">
						<input class="btn btn-primary" type="submit" value="Buscar">
					</div>
				</div>
			</form>
		</div>
	</div>
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