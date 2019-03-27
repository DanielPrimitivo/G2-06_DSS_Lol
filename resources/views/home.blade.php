@extends('layout')

@section('title', "Inicio")

@section('content')

	<div class="row">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <!--<div class="features-icons-icon d-flex">
              <i class="icon-screen-desktop m-auto text-primary"></i>
			</div>-->
			<div class="img d-flex">
      <a href="{{ route('champions') }}"></a>
      </div>
            <h3>Campeones</h3>
            <a href="{{ route('champions') }}">Lista</a>
            <p class="lead mb-0">Podremos ver a todos los campeones y ver sus habilidades</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <!--<div class="features-icons-icon d-flex">
              <i class="icon-layers m-auto text-primary"></i>
			</div>-->
			<div class="img d-flex"></div>
            <h3>Objetos</h3>
            <a href="{{ route('objects') }}">Lista</a>
            <p class="lead mb-0">Podremos ver todos los objetos junto a una breve descripción</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <!--<div class="features-icons-icon d-flex">
              <i class="icon-check m-auto text-primary"></i>
			</div>-->
			<div class="img d-flex"></div>
            <h3>Runas</h3>
            <a href="{{ route('runes') }}">Lista</a>
            <p class="lead mb-0">Se verá todas las runas e incluso una pequeña descripción para que no te pierdas</p>
          </div>
        </div>
      </div>

@endsection