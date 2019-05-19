@extends('layout')

@section('title', "Editar página de runas")

@section('content')

	<div class="row justify-content-center">
		<div class="col align-self-center">
			<div class="features-icons-item mx-auto mb-2 mt-2">
				<h1>Editar página de runas</h1>
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
            <form method="POST" action="{{ route('pagrune.update', ['runePage' => $runePage]) }}">
                {{ method_field('PUT') }} <!-- Para que este formulario sea de tipo PUT y así poder actualizar -->
                {{ csrf_field() }} <!--Prevencion contra ataques tipo CSRF -->

                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label falign">Nombre</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" value="{{old('name', $runePage->name)}}">
                    </div>
                </div>
                @if ($t1 != "Ninguno")
                    <div class="form-group row justify-content-center"><h3>{{$t1}}</h3></div>
                @endif
                <div class="form-group row">
                    <label for="inputState" class="col-sm-3 col-form-label falign">Runa 1</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="rune_id1" id="rune_id1">
                            <option value="{{$rune1->name}}" selected>{{$rune1->name}}</option>
                            @foreach ($type1 as $typ)
                                @if ($rune1->name != $typ->name) 
                                    <option value="{{$typ->id}}">{{$typ->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputState" class="col-sm-3 col-form-label falign">Runa 2</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="rune_id2" id="rune_id2">
                            <option value="{{$rune2->name}}" selected>{{$rune2->name}}</option>
                            @foreach ($type2 as $typ)
                            @if ($rune2->name != $typ->name) 
                                <option value="{{$typ->id}}">{{$typ->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputState" class="col-sm-3 col-form-label falign">Runa 3</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="rune_id3" id="rune_id3">
                            <option value="{{$rune3->name}}" selected>{{$rune3->name}}</option>
                            @foreach ($type3 as $typ)
                            @if ($rune3->name != $typ->name) 
                                <option value="{{$typ->id}}">{{$typ->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputState" class="col-sm-3 col-form-label falign">Runa 4</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="rune_id4" id="rune_id4">
                            <option value="{{$rune4->name}}" selected>{{$rune4->name}}</option>
                            @foreach ($type4 as $typ)
                            @if ($rune4->name != $typ->name) 
                                <option value="{{$typ->id}}">{{$typ->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                @if ($t2 != "Ninguno")
                    <div class="form-group row justify-content-center"><h3>{{$t2}}</h3></div>
                @endif
                <div class="form-group row">
                    <label for="inputState" class="col-sm-3 col-form-label falign">Runa 5</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="rune_id5" id="rune_id5">
                            <option value="{{$rune5->name}}" selected>{{$rune5->name}}</option>
                            @foreach ($type5 as $typ)
                            @if ($rune5->name != $typ->name) 
                                <option value="{{$typ->id}}">{{$typ->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputState" class="col-sm-3 col-form-label falign">Runa 6</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="rune_id6" id="rune_id6">
                            <option value="{{$rune6->name}}" selected>{{$rune6->name}}</option>
                            @foreach ($type6 as $typ)
                            @if ($rune6->name != $typ->name) 
                                <option value="{{$typ->id}}">{{$typ->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Actualizar página de runas</button>
                    </div>    
                </div>
            </form>
        </div>
    </div>

@endsection