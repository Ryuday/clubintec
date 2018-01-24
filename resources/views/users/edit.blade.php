@extends('layouts.app')

@section('title', "Crear usuario")
@section('subtitle', "{$title}")

@section('content')

      <form class="form-horizontal" action="{{ url("/usuarios/{$user->id}") }}" method="POST">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Nombre</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">Dirección de Correo</label>

            <div class="col-md-6">
                <input id="email" type="text" class="form-control" name="email" value="{{ old('email', $user->email) }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Contraseña</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-success">
                  Actualizar usuario
                </button>
                @if(Auth::user()->is_admin)
                  <a class="btn btn-danger" href="{{ route('users.show', ['id' => $user->id]) }}">
                    Cancelar
                  </a>
                @else
                  <a class="btn btn-danger" href="{{ route('home') }}">
                    Regresar
                  </a>
                @endif
            </div>
        </div>

      </form>
      @if(Auth::user()->is_admin)
        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <a class="btn btn-link" href="{{ route('home') }}">
                  Regresar al listado de usuarios
                </a>
            </div>
        </div>
      @endif
@endsection
