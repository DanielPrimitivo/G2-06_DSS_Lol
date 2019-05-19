@extends('layout')

@section('title', "Crear página de runas")

@section('content')

	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<h1>Crear página de runas</h1>
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
        <div class="col-md-12 col-lg-12">
			<form method="GET" action="{{ route('pagrune.filter') }}">
				<div class="form-group row">
					<label for="type" class="col-sm-2 col-form-label falign">Elige el tipo primario</label>
					<div class="col-sm-3">
						<select name="type1" id="type1" class="form-control">
                            @if ($t1 == "" || $t1 == "Ninguno") 
                                <option value="Ninguno" selected>Ninguno</option>
                            @else
                                <option value="Ninguno">Ninguno</option>
                            @endif
                            @if ($t1 == "Precision") 
                                <option value="Precision" selected>Precision</option>
                            @else
                                <option value="Precision" >Precision</option>
                            @endif
                            @if ($t1 == "Dominacion") 
                                <option value="Dominacion" selected>Dominacion</option>
                            @else
                                <option value="Dominacion" >Dominacion</option>
                            @endif
                            @if ($t1 == "Brujeria") 
                                <option value="Brujeria" selected>Brujeria</option>
                            @else
                                <option value="Brujeria" >Brujeria</option>
                            @endif
                            @if ($t1 == "Valor") 
                                <option value="Valor" selected>Valor</option>
                            @else
                                <option value="Valor">Valor</option>
                            @endif
                            @if ($t1 == "Inspiracion") 
                                <option value="Inspiracion" selected>Inspiracion</option>
                            @else
                                <option value="Inspiracion">Inspiracion</option>
                            @endif
						</select>
					</div>
					<label for="subtype" class="col-sm-2 col-form-label falign">Elige el tipo secundario</label>
					<div class="col-sm-3">
						<select name="type2" id="type2" class="form-control">
                        @if ($t2 == "" || $t2 == "Ninguno") 
                                <option value="Ninguno" selected>Ninguno</option>
                            @else
                                <option value="Ninguno">Ninguno</option>
                            @endif
                            @if ($t2 == "Precision") 
                                <option value="Precision" selected>Precision</option>
                            @else
                                <option value="Precision" >Precision</option>
                            @endif
                            @if ($t2 == "Dominacion") 
                                <option value="Dominacion" selected>Dominacion</option>
                            @else
                                <option value="Dominacion" >Dominacion</option>
                            @endif
                            @if ($t2 == "Brujeria") 
                                <option value="Brujeria" selected>Brujeria</option>
                            @else
                                <option value="Brujeria" >Brujeria</option>
                            @endif
                            @if ($t2 == "Valor") 
                                <option value="Valor" selected>Valor</option>
                            @else
                                <option value="Valor">Valor</option>
                            @endif
                            @if ($t2 == "Inspiracion") 
                                <option value="Inspiracion" selected>Inspiracion</option>
                            @else
                                <option value="Inspiracion">Inspiracion</option>
                            @endif
						</select>
					</div>
					<div class="col-sm-2">
						<input class="btn btn-primary" type="submit" value="Buscar">
					</div>
				</div>
			</form>
		</div>
	</div>

    
            <form method="POST" action="{{route('pagrune.create.post')}}">
                {{ csrf_field() }} <!--Prevencion contra ataques tipo CSRF -->

                <!-- Formulario para añadir nueva página de runas -->
                <div  class="row justify-content-center align-items-center space">
                <div class="col-md-8 col-lg-6">

                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label falign">Nombre</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" value="{{old('name')}}">
                    </div>
                </div>
                </div>
                </div>
                <div class="imgprueba row justify-content-center align-items-center ">
                <div class="col-md-8 col-lg-6">
                @if ($t1 != "Ninguno")
                    <div class="form-group row justify-content-center"><h3>{{$t1}}</h3></div>
                @endif
                <div class="form-group row">
                    <label for="inputState" class="col-sm-3 col-form-label falign">Runa 1</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="rune_id1" id="rune_id1">
                            <option value="Ninguno" selected>Ninguno</option>
                            @foreach ($type1 as $typ)
                                <option value="{{$typ->id}}">{{$typ->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputState" class="col-sm-3 col-form-label falign">Runa 2</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="rune_id2" id="rune_id2">
                            <option value="Ninguno" selected>Ninguno</option>
                            @foreach ($type2 as $typ)
                                <option value="{{$typ->id}}">{{$typ->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputState" class="col-sm-3 col-form-label falign">Runa 3</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="rune_id3" id="rune_id3">
                            <option value="Ninguno" selected>Ninguno</option>
                            @foreach ($type3 as $typ)
                                <option value="{{$typ->id}}">{{$typ->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputState" class="col-sm-3 col-form-label falign">Runa 4</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="rune_id4" id="rune_id4">
                            <option value="Ninguno" selected>Ninguno</option>
                            @foreach ($type4 as $typ)
                                <option value="{{$typ->id}}">{{$typ->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
</div></div>
<div class="imgprueba row justify-content-center align-items-center">
                <div class="col-md-8 col-lg-6">
                @if ($t2 != "Ninguno")
                    <div class="form-group row justify-content-center"><h3>{{$t2}}</h3></div>
                @endif
                <div class="form-group row">
                    <label for="inputState" class="col-sm-3 col-form-label falign">Runa 5</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="rune_id5" id="rune_id5">
                            <option value="Ninguno" selected>Ninguno</option>
                            @foreach ($type5 as $typ)
                                <option value="{{$typ->id}}">{{$typ->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputState" class="col-sm-3 col-form-label falign">Runa 6</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="rune_id6" id="rune_id6">
                            <option value="Ninguno" selected>Ninguno</option>
                            @foreach ($type6 as $typ)
                                <option value="{{$typ->id}}">{{$typ->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Crear página de runas</button>
                </div>
                </div>
                </div>
            </form>
        

@endsection