@extends('layout')

@section('title', "Editar campeon")

@section('content')

	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<h1>Editar campeón</h1>
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
            <form method="POST" action="{{ route('champion.update', ['champion' => $champion]) }}">
                {{ method_field('PUT') }} <!-- Para que este formulario sea de tipo PUT y así poder actualizar -->
                {{ csrf_field() }} <!--Prevencion contra ataques tipo CSRF -->

                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label falign">Nombre</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" value="{{old('name', $champion->name)}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rol" class="col-sm-3 col-form-label falign">Rol</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="rol" id="rol" placeholder="Rol" value="{{old('rol', $champion->rol)}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-3 col-form-label falign">Título</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Titulo" value="{{old('title', $champion->title)}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="location" class="col-sm-3 col-form-label falign">Localización</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="location" id="location" placeholder="Localizacion" value="{{old('location', $champion->location)}}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Actualizar campeón</button>
                    </div>    
                </div>
            </form>
        </div>
    </div>

@endsection