@extends('layouts.app')

@section('subtitle', "Registrar usuario")

@section('content')

      <form class="form-horizontal" action="{{ route("home") }}" method="POST">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Nombre</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
          <label for="username" class="col-md-4 control-label">Usuario</label>
          <div class="col-md-6">
            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required>
            @if ($errors->has('username'))
              <span class="help-block">
                <strong>{{ $errors->first('username') }}</strong>
              </span>
            @endif
          </div>
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">Dirección de Correo</label>

            <div class="col-md-6">
                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
      @if(Auth::user()->role_id == 1)
        <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
            <label for="role" class="col-md-4 control-label">Rol del usuario</label>

            <div class="col-md-6">
                <select id="role" class="form-control" name="role" selected=1 style="height: 36px">
                      <option value="0">Seleccione</option>
                      @foreach($roles as $id => $rol)
                         <option value="{{ $id }}" {{
                            old('role') == $id
                                ? 'selected="selected"'
                                : ''

                         }}>{{ $rol }}</option>
                      @endforeach
                </select>
                @if ($errors->has('role'))
                    <span class="help-block">
                        <strong>{{ $errors->first('role') }}</strong>
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
                  Registrar usuario
                </button>
                @if(Auth::user()->role_id == 1)
                  <a class="btn btn-danger" href="{{ route('home') }}">
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

@endsection
