@extends('layouts.app')

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
        <label class="col-md-4 control-label">Usuario</label>
        <div class="col-md-6">
            <input type="text" class="form-control" value="{{ $user->username }}" disabled>
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
            <input type="text" class="form-control" value="{{ isset($user->role->title) ? $user->role->title : 'Sin Asignar' }}" disabled>
        </div>
    </div>
    @if(Auth::user()->role_id == 1)
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
