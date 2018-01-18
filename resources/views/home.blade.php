@extends('layouts.app')
@section('title', "Usuarios")
@section('subtitle', 'Listado de usuarios')
@section('content')

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

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

@endsection
