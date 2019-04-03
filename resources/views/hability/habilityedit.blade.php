@extends('layout')

@section('title', "Editar habilidad")

@section('content')

	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<h1>Editar habilidad</h1>
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
            <form method="POST" action="{{ route('hability.update', ['hability' => $hability]) }}">
                {{ method_field('PUT') }} <!-- Para que este formulario sea de tipo PUT y así poder actualizar -->
                {{ csrf_field() }} <!--Prevencion contra ataques tipo CSRF -->

                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label falign">Nombre</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" value="{{old('name', $hability->name)}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-3 col-form-label falign">Rol</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="description" id="description" placeholder="Descripción" value="{{old('description', $hability->description)}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="champion_id" class="col-sm-3 col-form-label falign">Título</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="champion_id" id="champion_id" placeholder="Campeón" value="{{old('champion_id', $hability->champion_id)}}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Actualizar habilidad</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection