@extends('layouts.app')
@section('title', "Usuarios")
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>{{ $title }}</h1></div>

                <div class="panel-body">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
