@extends('layout')

@section('title', "Editar campeon")

@section('content')

	<h1>Editar habilidad</h1>

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

	<form method="POST" action="{{ route('hability.update', ['hability' => $hability]) }}">
        {{ method_field('PUT') }} <!-- Para que este formulario sea de tipo PUT y así poder actualizar -->
        {{ csrf_field() }} <!--Prevencion contra ataques tipo CSRF -->

        <!-- Formulario para añadir nuevo campeon -->

        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" placeholder="Nombre" value="{{old('name', $hability->name)}}">
        <br>
        <label for="description">Rol:</label>
        <input type="text" name="description" id="description" placeholder="Descripción" value="{{old('description', $hability->description)}}">
        <br>
        <label for="champion_id">Título:</label>
        <input type="text" name="champion_id" id="champion_id" placeholder="Campeón" value="{{old('champion_id', $hability->champion_id)}}">
        <br>
        <button type="submit">Actualizar habilidad</button>
    </form>

@endsection