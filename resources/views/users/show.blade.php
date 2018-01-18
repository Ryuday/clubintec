@extends('layouts.app')

@section('title', "Usuario {$user->id}")
@section('subtitle', "Datos de {$user->name}")

@section('content')

      <p>Nombre del usuario: {{ $user->name }}</p>
      <p>Correo electrónico: {{ $user->email }}</p>

      <p>

        <a href="{{ route('users.edit', ['id' => $user->id]) }}">Editar usuario</a>

      </p>

      <p>

        <a href="{{ route('home') }}">Regresar al listado de usuarios</a>

      </p>

@endsection
