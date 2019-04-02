@extends('layout')

@section('title', "Editar campeon")

@section('content')

	<h1>Editar campeon</h1>

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

	<form method="POST" action="{{ route('champion.update', ['champion' => $champion]) }}">
        {{ method_field('PUT') }} <!-- Para que este formulario sea de tipo PUT y así poder actualizar -->
        {{ csrf_field() }} <!--Prevencion contra ataques tipo CSRF -->

        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" placeholder="Nombre" value="{{old('name', $champion->name)}}">
        <br>
        <label for="rol">Rol:</label>
        <input type="text" name="rol" id="rol" placeholder="Rol" value="{{old('rol', $champion->rol)}}">
        <br>
        <label for="title">Título:</label>
        <input type="text" name="title" id="title" placeholder="Titulo" value="{{old('title', $champion->title)}}">
        <br>
        <label for="location">Localización:</label>
        <input type="text" name="location" id="location" placeholder="Localizacion" value="{{old('location', $champion->location)}}">
        <br>
        <button type="submit">Actualizar campeón</button>
    </form>

@endsection