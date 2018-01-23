@extends('layouts.app')
@section('title', "Usuarios")
@section('subtitle')
  <div class="content">
    <div class="row">
      <div class="col-md-4">
        <h5>Listado de usuarios</h5>
      </div>
      <div class="col-md-4 offset-md-4 col-sm-4 offset-sm-8">
        <a class="btn btn-primary" href="#">Registrar usuario</a>
      </div>
    </div>
  </div>
@endsection
@section('content')
  @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
  @endif
  @if ( Auth::user()->is_admin === 1)
    <ul>
      @forelse ( $users as $user )
        <li>
          {{ $user->name }}, ({{ $user->email }})
          <a href="{{ route('users.show', ['id' => $user->id]) }}">Ver detalles</a>
        </li>
      @empty
        <li>No hay usuarios registrados.</li>
      @endforelse
    </ul>
  @else
    <a href="{{ route('users.show', ['id' => Auth::user()->id]) }}">Ver detalles</a>
  @endif

@endsection
