<div class="card-body">
  <div class="row">
      <div class="col-md-12 col-xl-4">
          <div class="form-group">
            <label class="col-sm-12 col-form-label">{{ trans('cruds.consultant') }} <span class="text-red">*</span></label>
              <div class="col-sm-12">
                  <select class="form-control form-select select2" id="consultant_id" name="consultant_id" data-bs-placeholder="Select">
                      <option value="" selected> {{ trans('cruds.consultant') }}</option>
                      @foreach(App\Entities\Admin\Consultant::all() as $consultant)
                          <option value="{{ $consultant->id }}" {{ old('consultant_id') == $consultant->id ? 'selected' : '' }}>{{ $consultant->email }}</option>
                      @endforeach
                </select>
              </div>
          </div>
      </div>
  </div>
</div>

<table id="table" class="table table-bordered table-striped example1" width="100%">
  <thead>
      <tr>
          <th>{{trans('cruds.id')}}</th>
          <th>{{trans('cruds.title')}}</th>
          <th>{{trans('cruds.message')}}</th>
          <th>{{ trans('cruds.action') }}</th>
      </tr>
    </thead>
    <tbody>
     </tbody>
    <tfoot>
      <tr>
          <th>{{trans('cruds.id')}}</th>
          <th>{{trans('cruds.title')}}</th>
          <th>{{trans('cruds.message')}}</th>
          <th>{{ trans('cruds.action') }}</th>
      </tr>
    </tfoot>
  </table>
@section('js')
<script>
  $(function() {
      $('#table').DataTable({
          processing: true,
          serverSide: true,
         
          ajax: {
            url: '{{ route("consultations.index") }}',
            data: function (d) {
                d.consultant_id = $('#consultant_id').val();
                d.search = $('input[type="search"]').val();
            }},
          columns: [
              { data: 'id', name: 'id' },
              { data: 'title', name: 'title' },
              { data: 'message', name: 'message' },
              { data: 'action', name: 'action', orderable: false, searchable: false }
          ],
          responsive: true,
          paging: true,
          lengthChange: true,
          searching: true,
          ordering: true,
          info: true,
          autoWidth: true,
          dom: '<"top"lfB>rt<"bottom"ip><"clear">',
          buttons: []
      }).buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');

      $('#consultant_id').change(function() {
            $('#table').DataTable().ajax.reload();
        });
  });
</script>
<script src="{{asset('build/assets/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{ asset('build/assets/plugins/select2/select2.full.min.js') }}"></script>
<link rel="modulepreload" href="{{ asset('build/assets/select2-eb416f6c.js') }}" />
<script type="module" src="{{ asset('build/assets/select2-eb416f6c.js')}}"></script> 
<script src="{{asset('build/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('build/assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
<script src="{{asset('build/assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('build/assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
<script src="{{asset('build/assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{asset('build/assets/plugins/datatable/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('build/assets/plugins/datatable/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('build/assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('build/assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{asset('build/assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('build/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('build/assets/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>
<script src="{{asset('build/table-data.js')}}"></script>

@endsection

