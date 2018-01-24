@extends('layouts.app')

@section('title', "Usuario {$user->id}")
@section('subtitle', "Datos de {$user->name}")

@section('content')
  <div class="form-horizontal">

    <div class="form-group">
        <label class="col-md-4 control-label">Nombre</label>
        <div class="col-md-6">
            <input type="text" class="form-control" value="{{ $user->name }}" disabled>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label">Dirección de Correo</label>
        <div class="col-md-6">
            <input type="text" class="form-control" value="{{ $user->email }}" disabled>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label">Privilegios</label>
        <div class="col-md-6">
            <input type="text" class="form-control" value="{{ $user->is_admin }}" disabled>
        </div>
    </div>
    @if(Auth::user()->isAdmin)
      <div class="form-group">
        <div class="col-md-8 col-md-offset-4">
          <a class="btn btn-primary" href="{{ route('users.edit', ['id' => $user->id]) }}">
            Editar
          </a>
          <a class="btn btn-default" href="{{ route('home') }}">
            Regresar
          </a>
        </div>
      </div>
    @endif
@endsection
