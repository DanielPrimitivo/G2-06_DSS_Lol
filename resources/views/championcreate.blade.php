@extends('layout')

@section('title', "Crear campeon")

@section('content')

	<h1>Crear campeon</h1>

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

	<form method="POST" action="{{route('champions.create.post')}}">
        {{ csrf_field() }} <!--Prevencion contra ataques tipo CSRF -->

        <!-- Formulario para añadir nuevo campeon -->

        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" placeholder="Nombre" value="{{old('name')}}">
        <br>
        <label for="rol">Rol:</label>
        <input type="text" name="rol" id="rol" placeholder="Rol" value="{{old('rol')}}">
        <br>
        <label for="title">Título:</label>
        <input type="text" name="title" id="title" placeholder="Titulo" value="{{old('title')}}">
        <br>
        <label for="location">Localización:</label>
        <input type="text" name="location" id="location" placeholder="Localizacion" value="{{old('location')}}">
        <br>
        <button type="submit">Crear campeón</button>
    </form>

@endsection