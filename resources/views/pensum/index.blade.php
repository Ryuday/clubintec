@extends('layouts.app')
@section('subtitle')
  <div class="content">
    <div class="row">
        <div class="col-md-4">
          <h5>
              Listado de Programas
          </h5>
        </div>
        @if(Auth::user()->role_id == 1)
          <div class="col-md-4 offset-md-4 col-sm-4 offset-sm-8">
            <a class="btn btn-primary" href="{{ route('users.create', ['role' => 'administrador']) }}">Registrar programa</a>
          </div>
        @endif
    </div>
  </div>
@endsection
@section('content')
  @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
  @endif
  <table class="table table-bordered" id="pensum-table">
      <thead>
          <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Action</th>
          </tr>
      </thead>
  </table>

@endsection
@push('scripts')
<script>
$(function() {
    $('#pensum-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datatables.pensum') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush
