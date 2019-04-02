@extends('layout')

@section('title', "Editar objeto")

@section('content')

	<h1>Editar objeto</h1>

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

	<form method="POST" action="{{ route('object.update', ['object' => $object]) }}">
        {{ method_field('PUT') }} <!-- Para que este formulario sea de tipo PUT y así poder actualizar -->
        {{ csrf_field() }} <!--Prevencion contra ataques tipo CSRF -->

        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" placeholder="Nombre" value="{{old('name', $object->name)}}">
        <br>
        <label for="price">Precio:</label>
        <input type="number" name="price" id="price" placeholder="Precio" value="{{old('price', $object->price)}}">
        <br>
        <label for="description">Título:</label>
        <input type="text" name="description" id="description" placeholder="Descripcion" value="{{old('description', $object->description)}}">
        <br>
        <label for="type">Tipo:</label>
        <input type="text" name="type" id="type" placeholder="Tipo" value="{{old('type', $object->type)}}">
        <br>
        <label for="subtype">Subtipo:</label>
        <input type="text" name="subtype" id="subtype" placeholder="Subtipo" value="{{old('subtype', $object->subtype)}}">
        <br>
        <button type="submit">Actualizar objeto</button>
    </form>

@endsection