@extends('layout')

@section('title', "Inicio")

@section('content')

	<div class="row justify-content-center">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <!--<div class="features-icons-icon d-flex">
              <i class="icon-screen-desktop m-auto text-primary"></i>
			      </div>-->
            <a href="{{ route('champions.list') }}" class="lin">
              <div class="img_champion d-flex">
              </div>
              <h3>Campeones</h3>
            </a>
            <p class="lead mb-0">Podemos ver, crear, modificar y eliminar.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <!--<div class="features-icons-icon d-flex">
              <i class="icon-layers m-auto text-primary"></i>
            </div>-->
            <a href="{{ route('objects.list') }}" class="lin">
              <div class="img_object d-flex"></div>
              <h3>Objetos</h3>
            </a>
            <p class="lead mb-0">Podemos ver, crear, modificar y eliminar.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <!--<div class="features-icons-icon d-flex">
              <i class="icon-check m-auto text-primary"></i>
            </div>-->
            <a href="{{ route('runes.list') }}" class="lin">
			        <div class="img_rune d-flex"></div>
              <h3>Runas</h3>
            </a>
            <p class="lead mb-0">Podemos ver, crear, modificar y eliminar.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <!--<div class="features-icons-icon d-flex">
              <i class="icon-check m-auto text-primary"></i>
            </div>-->
            <a href="{{ route('spells.list') }}" class="lin">
			        <div class="img_rune d-flex"></div>
              <h3>Hechizos</h3>
            </a>
            <p class="lead mb-0">Podemos ver, crear, modificar y eliminar.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <!--<div class="features-icons-icon d-flex">
              <i class="icon-check m-auto text-primary"></i>
            </div>-->
            <a href="{{ route('pagrunes.list') }}" class="lin">
			        <div class="img_rune d-flex"></div>
              <h3>Páginas de runas</h3>
            </a>
            <p class="lead mb-0">Podemos ver, crear, modificar y eliminar.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <!--<div class="features-icons-icon d-flex">
              <i class="icon-check m-auto text-primary"></i>
            </div>-->
            <a href="{{ route('builds.list') }}" class="lin">
			        <div class="img_rune d-flex"></div>
              <h3>Builds</h3>
            </a>
            <p class="lead mb-0">Podemos ver, crear, modificar y eliminar.</p>
          </div>
        </div>
		<div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <!--<div class="features-icons-icon d-flex">
              <i class="icon-check m-auto text-primary"></i>
            </div>-->
            <a href="{{ route('habilities.list') }}" class="lin">
			        <div class="img_hability d-flex"></div>
              <h3>Habilidades</h3>
            </a>
            <p class="lead mb-0">Podemos ver, modificar y eliminar.</p>
          </div>
        </div>
		<div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <!--<div class="features-icons-icon d-flex">
              <i class="icon-check m-auto text-primary"></i>
            </div>-->
            <a href="{{ route('users.list') }}" class="lin">
			        <div class="img_user d-flex"></div>
              <h3>Usuarios</h3>
            </a>
            <p class="lead mb-0">Podemos ver y eliminar.</p>
          </div>
        </div>
      </div>

@endsection