@extends('layouts.app')

@section('title', "Usuario {$user->id}")

@section('content')
      <div class="container">
          <div class="row">
              <div class="col-md-8 col-md-offset-2">
                  <div class="panel panel-default">
                      <div class="panel-heading"><h1>{{ $title }}</h1></div>
                      <div class="panel-body">
                        <h1>Usuario #{{ $user->id }}</h1>

                        <p>Nombre del usuario: {{ $user->name }}</p>
                        <p>Correo electrónico: {{ $user->email }}</p>

                        <p>

                          <a href="">Editar usuario</a>

                        </p>

                        <p>

                          <a href="">Regresar al listado de usuarios</a>

                        </p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
@endsection
