@extends('layout')

@section('title', "Crear hechizo")

@section('content')

	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<h1>Crear hechizo</h1>
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
            <form method="POST" action="{{route('build.create.post')}}">
                {{ csrf_field() }} <!--Prevencion contra ataques tipo CSRF -->

                <!-- Formulario para añadir nueva build -->

                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label falign">Nombre</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" value="{{old('name')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputState" class="col-sm-3 col-form-label falign">Campeón</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="champion_id" id="champion_id">
                            <option value="Ninguno" selected>Ninguno</option>
                            @foreach ($champions as $champion)
                                <option value="{{$champion->id}}">{{$champion->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputState" class="col-sm-3 col-form-label falign">Pag. Runas</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="page_rune_id" id="page_rune_id">
                            <option value="Ninguno" selected>Ninguno</option>
                            @foreach ($page_runes as $page_rune)
                                <option value="{{$page_rune->id}}">{{$page_rune->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputState" class="col-sm-3 col-form-label falign">Hechizo 1</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="spell_id1" id="spell_id1">
                            <option value="Ninguno" selected>Ninguno</option>
                            @foreach ($spells as $spell)
                                <option value="{{$spell->id}}">{{$spell->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputState" class="col-sm-3 col-form-label falign">Hechizo 2</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="spell_id2" id="spell_id2">
                            <option value="Ninguno" selected>Ninguno</option>
                            @foreach ($spells as $spell)
                                <option value="{{$spell->id}}">{{$spell->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputState" class="col-sm-3 col-form-label falign">Objeto 1</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="object_id1" id="object_id1">
                            <option value="Ninguno" selected>Ninguno</option>
                            @foreach ($objects as $object)
                                <option value="{{$object->id}}">{{$object->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputState" class="col-sm-3 col-form-label falign">Objeto 2</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="object_id2" id="object_id2">
                            <option value="Ninguno" selected>Ninguno</option>
                            @foreach ($objects as $object)
                                <option value="{{$object->id}}">{{$object->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputState" class="col-sm-3 col-form-label falign">Objeto 3</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="object_id3" id="object_id3">
                            <option value="Ninguno" selected>Ninguno</option>
                            @foreach ($objects as $object)
                                <option value="{{$object->id}}">{{$object->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputState" class="col-sm-3 col-form-label falign">Objeto 4</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="object_id4" id="object_id4">
                            <option value="Ninguno" selected>Ninguno</option>
                            @foreach ($objects as $object)
                                <option value="{{$object->id}}">{{$object->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputState" class="col-sm-3 col-form-label falign">Objeto 5</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="object_id5" id="object_id5">
                            <option value="Ninguno" selected>Ninguno</option>
                            @foreach ($objects as $object)
                                <option value="{{$object->id}}">{{$object->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputState" class="col-sm-3 col-form-label falign">Objeto 6</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="object_id6" id="object_id6">
                            <option value="Ninguno" selected>Ninguno</option>
                            @foreach ($objects as $object)
                                <option value="{{$object->id}}">{{$object->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Crear build</button>
                </div>
            </form>
        </div>
    </div>

@endsection