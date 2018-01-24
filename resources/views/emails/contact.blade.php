@extends('layouts.app')
@section('subtitle', 'Contacto')
@section('content')
  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
  <form class="form-horizontal" method="POST" action="{{ route('contact') }}">
      {{ csrf_field() }}
    @guest
      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <label for="name" class="col-md-4 control-label">Nombre</label>

          <div class="col-md-6">
              <input id="name" type="name" class="form-control" name="name" value="" required autofocus>

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
              <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required>

              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
          </div>
      </div>
    @endguest
      <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
          <label for="title" class="col-md-4 control-label">Titulo de mensaje</label>

          <div class="col-md-6">
              <input id="title" type="title" class="form-control" name="title" value="" required autofocus>

              @if ($errors->has('title'))
                  <span class="help-block">
                      <strong>{{ $errors->first('title') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
          <label for="message" class="col-md-4 control-label">Mensaje</label>

          <div class="col-md-6">
              <textarea id="message" type="text" class="form-control" name="message" required></textarea>

              @if ($errors->has('message'))
                  <span class="help-block">
                      <strong>{{ $errors->first('message') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group">
          <div class="col-md-8 col-md-offset-4">
              <button type="submit" class="btn btn-primary">
                  Enviar mensaje
              </button>
          </div>
      </div>
  </form>
@endsection
