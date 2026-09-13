<table id="table" class="table table-bordered table-striped example1" width="100%">
  <thead>
      <tr>
          <th>{{trans('cruds.id')}}</th>
          <th>{{trans('cruds.title')}}</th>
          <th>{{trans('cruds.link')}}</th>
          <th>{{trans('cruds.photo')}}</th>
          <th>{{ trans('cruds.action') }}</th>
      </tr>
    </thead>
    <tbody>
     </tbody>
    <tfoot>
      <tr>
          <th>{{trans('cruds.id')}}</th>
          <th>{{trans('cruds.title')}}</th>
          <th>{{trans('cruds.link')}}</th>
          <th>{{trans('cruds.photo')}}</th>
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
          ajax: '{{ route('banners.index') }}',
          columns: [
              { data: 'id', name: 'id' },
              { data: 'title', name: 'title' },
              { data: 'link', name: 'link' },
              { data: 'photo', name: 'photo' },
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

