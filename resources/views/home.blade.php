@extends('layouts.app')
@section('title', "Usuarios")
@section('subtitle')
  <div class="row justify-content-between">
    <div class="col">
      Listado de usuarios
    </div>
    <div class="col">
      <a href="#">Registrar usuario</a>
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
