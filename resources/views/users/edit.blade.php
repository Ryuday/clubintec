@extends('layouts.app')

@section('title', "Crear usuario")
@section('subtitle', "Actualizar usuario")

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
      @if(Auth::user()->role_id == 1)
        <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
            <label for="role_id" class="col-md-4 control-label">Rol del usuario</label>

            <div class="col-md-6">
                <select id="role_id" class="form-control" name="role_id" selected=1 style="height: 36px">
                      <option value="0">Seleccione</option>
                      @foreach($roles as $id => $rol)
                         <option value="{{ $id }}" {{
                           old('role_id', $user->role_id) == null
                            ? ($user->role_id == $id
                                 ? 'selected="selected"'
                                 : '')
                            : (old('role_id', $user->role_id) == $id
                                  ? 'selected="selected"'
                                  : '')

                         }}>{{ $rol }}</option>
                      @endforeach
                </select>
                @if ($errors->has('role'))
                    <span class="help-block">
                        <strong>{{ $errors->first('role_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>
      @endif
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Contraseña</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>
            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-success">
                  Actualizar usuario
                </button>
                @if(Auth::user()->role_id == 1)
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
      @if(Auth::user()->role_id == 1)
        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <a class="btn btn-link" href="{{ route('home') }}">
                  Regresar al listado de usuarios
                </a>
            </div>
        </div>
      @endif
@endsection
