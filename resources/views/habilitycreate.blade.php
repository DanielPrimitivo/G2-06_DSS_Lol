@extends('layout')

@section('title', "Crear habilidad")

@section('content')

	<h1>Crear habilidad</h1>

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

	<form method="POST" action="{{route('hability.create.post')}}">
        {{ csrf_field() }} <!--Prevencion contra ataques tipo CSRF -->

        <!-- Formulario para añadir nuevo campeon -->

        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" placeholder="Nombre" value="{{old('name')}}">
        <br>
        <label for="description">Descripción:</label>
        <input type="text" name="description" id="description" placeholder="Descripción" value="{{old('description')}}">
        <br>
        <label for="champion_id">Campeón:</label>
        <input type="text" name="champion_id" id="champion_id" placeholder="Campeón" value="{{old('champion_id')}}">
        <br>
        <button type="submit">Crear habilidad</button>
    </form>

@endsection