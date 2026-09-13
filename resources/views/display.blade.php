@extends('layouts.master')
@section('content')
<section class="page-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ trans('cruds.products') }}</h1>
            <br>
        </div>
    <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans('cruds.home') }}</a></li>
            <li class="breadcrumb-item active">{{ trans('cruds.products') }}</li>
          </ol>
        </div>
      </div>
    </div>
</section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">

                <table id="table" class="table table-bordered table-striped ">
                    <thead>
                        <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                    <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                    </tr>
                    </tfoot>
                  </table>
                

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


@section('scripts')
     <script>
        $(function() {
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('index') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' }
                ],
                responsive: true,
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection

  @endsection

