@extends('layout')

@section('title', "Contacto")

@section('content')

<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<h1>Contactar</h1>
			</div>
		</div>
	</div>

    @if($errors->any())
        <div class="alert alert-danger">
            <h4>Hemos encontrado los siguientes errores</h4>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <div class="row justify-content-center align-items-center space">
        <div class="col-md-8 col-lg-6">
            <!--<form method="POST" action="{{route('champion.create.post')}}">
                {{ csrf_field() }}--> <!--Prevencion contra ataques tipo CSRF -->

                <!-- Formulario para añadir nuevo campeon -->

                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label falign">Nombre</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" value="{{old('name')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rol" class="col-sm-3 col-form-label falign">Apellidos</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="rol" id="rol" placeholder="Apellidos" value="{{old('rol')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-3 col-form-label falign">Teléfono</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Teléfono" value="{{old('title')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label falign">Email</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="location" id="location" placeholder="e-mail" value="{{old('location')}}">
                    </div>
                </div>                
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label falign">Mensaje</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="location" id="location" placeholder="Mensaje" value="{{old('location')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Enviar petición</button>
                    </div>
                </div>
            <!--</form>-->
        </div>
    </div>

@endsection