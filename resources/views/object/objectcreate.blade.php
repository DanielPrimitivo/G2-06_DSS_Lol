@extends('layout')

@section('title', "Crear objeto")

@section('content')

	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<h1>Crear objeto</h1>
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
            <form method="POST" action="{{route('object.create.post')}}">
                {{ csrf_field() }} <!--Prevencion contra ataques tipo CSRF -->

                <!-- Formulario para añadir nuevo campeon -->

                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label falign">Nombre</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" value="{{old('name')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-sm-3 col-form-label falign">Precio</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="price" id="price" placeholder="Precio" value="{{old('price')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-3 col-form-label falign">Descripcion</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="description" id="description" placeholder="Descripcion" value="{{old('description')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="type" class="col-sm-3 col-form-label falign">Tipo</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="type" id="type" placeholder="Tipo" value="{{old('type')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="subtype" class="col-sm-3 col-form-label falign">Subtipo</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="subtype" id="subtype" placeholder="Subtipo" value="{{old('subtype')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Crear objeto</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection