@extends('layout')

@section('title', "Crear objeto")

@section('content')

	<h1>Crear Objecto</h1>

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

	<form method="POST" action="{{route('object.create.post')}}">
        {{ csrf_field() }} <!--Prevencion contra ataques tipo CSRF -->

        <!-- Formulario para añadir nuevo campeon -->

        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" placeholder="Nombre" value="{{old('name')}}">
        <br>
        <label for="price">Precio:</label>
        <input type="number" name="price" id="price" placeholder="Precio" value="{{old('price')}}">
        <br>
        <label for="description">Título:</label>
        <input type="text" name="description" id="description" placeholder="Descripcion" value="{{old('description')}}">
        <br>
        <label for="type">Tipo:</label>
        <input type="text" name="type" id="type" placeholder="Tipo" value="{{old('type')}}">
        <br>
        <label for="subtype">Subtipo:</label>
        <input type="text" name="subtype" id="subtype" placeholder="Subtipo" value="{{old('subtype')}}">
        <br>
        <button type="submit">Crear objeto</button>
    </form>

@endsection