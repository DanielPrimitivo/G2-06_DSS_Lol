@extends('layout')

@section('title', "Crear runa")

@section('content')

	<h1>Crear runa</h1>

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

	<form method="POST" action="{{route('rune.create.post')}}">
        {{ csrf_field() }} <!--Prevencion contra ataques tipo CSRF -->

        <!-- Formulario para añadir nuevo campeon -->

        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" placeholder="Nombre" value="{{old('name')}}">
        <br>
        <label for="type">Tipo:</label>
        <input type="text" name="type" id="type" placeholder="Tipo" value="{{old('type')}}">
        <br>
        <label for="row">Subtipo:</label>
        <input type="number" name="row" id="row" placeholder="Fila (numero)" value="{{old('row')}}">
        <br>
        <button type="submit">Crear runa</button>
    </form>

@endsection