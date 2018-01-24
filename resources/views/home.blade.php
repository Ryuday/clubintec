@extends('layouts.app')
@section('title', "Usuarios")
@section('subtitle')
  <div class="content">
    <div class="row">
        <div class="col-md-4">
          <h5>
            @if(Auth::user()->isAdmin)
              Listado de usuarios
            @else
              Datos del usuario
            @endif
          </h5>
        </div>
        <div class="col-md-4 offset-md-4 col-sm-4 offset-sm-8">
          @if(Auth::user()->isAdmin)
            <a class="btn btn-primary" href="#">Registrar usuario</a>
          @else
            <a class="btn btn-primary" href="{{ route('users.edit', ['id' => Auth::user()->id]) }}">Actualizar usuario</a>
          @endif
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
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
  @else
    @include('users.show', ['user' => Auth::user()])
  @endif

@endsection
@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datatables.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush
