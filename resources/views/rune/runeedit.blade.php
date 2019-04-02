@extends('layout')

@section('title', "Editar runa")

@section('content')

	<h1>Editar runa</h1>

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

	<form method="POST" action="{{ route('rune.update', ['rune' => $rune]) }}">
        {{ method_field('PUT') }} <!-- Para que este formulario sea de tipo PUT y así poder actualizar -->
        {{ csrf_field() }} <!--Prevencion contra ataques tipo CSRF -->

        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" placeholder="Nombre" value="{{old('name', $rune->name)}}">
        <br>
        <label for="type">Tipo:</label>
        <input type="text" name="type" id="type" placeholder="Tipo" value="{{old('type', $rune->type)}}">
        <br>
        <label for="row">Fila:</label>
        <input type="number" name="row" id="row" placeholder="Fila (numerico)" value="{{old('row', $rune->row)}}">
        <br>
        <button type="submit">Actualizar runa</button>
    </form>

@endsection