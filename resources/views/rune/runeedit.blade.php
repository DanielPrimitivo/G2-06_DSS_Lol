@extends('layout')

@section('title', "Editar runa")

@section('content')

	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<h1>Editar runa</h1>
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
            <form method="POST" action="{{ route('rune.update', ['rune' => $rune]) }}">
                {{ method_field('PUT') }} <!-- Para que este formulario sea de tipo PUT y así poder actualizar -->
                {{ csrf_field() }} <!--Prevencion contra ataques tipo CSRF -->

                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label falign">Nombre</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" value="{{old('name', $rune->name)}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="type" class="col-sm-3 col-form-label falign">Tipo</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="type" id="type" placeholder="Tipo" value="{{old('type', $rune->type)}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="row" class="col-sm-3 col-form-label falign">Fila</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="row" id="row" placeholder="Fila (numerico)" value="{{old('row', $rune->row)}}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Actualizar runa</button>
                    </div>    
                </div>
            </form>
        </div>
    </div>

@endsection