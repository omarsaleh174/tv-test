<div class="card">
  <div class="card-body">
    <div class="row">
     <div class="col-3">
       {!!  select(['label'=>'sub_category','name'=>'sub_category_id','view_data'=>'title_en','value'=>'','errors'=>'','items'=>$sub_categories] )  !!}
      </div>
     <div class="col-3">
       {!!  select(['label'=>'unit','name'=>'unit_id','view_data'=>'title_en','value'=>'','errors'=>'','items'=>$units] )  !!}
      </div>
      
    </div>
  </div>
</div>

<table id="table" class="table table-bordered table-striped example1" width="100%">
  <thead>
    <tr style="">
          <th>{{trans('cruds.id')}}</th>
          <th>{{trans('cruds.title_en')}}</th>
          <th>{{trans('cruds.title_ar')}}</th>
          <th>{{trans('cruds.amount')}}</th>
          <th>{{trans('cruds.real_price')}}</th>
          <th>{{trans('cruds.sub_category') }}</th>
          <th>{{trans('cruds.unit') }}</th>
          <th>{{trans('cruds.action') }}</th>
            </tr>
    </thead>
  <tbody>
     </tbody>
    <tfoot>
      <tr>
        <th>{{trans('cruds.id')}}</th>
        <th>{{trans('cruds.title_en')}}</th>
        <th>{{trans('cruds.title_ar')}}</th>
        <th>{{trans('cruds.amount')}}</th>
        <th>{{trans('cruds.real_price')}}</th>
        <th>{{trans('cruds.sub_category') }}</th>
        <th>{{trans('cruds.unit') }}</th>
        <th>{{trans('cruds.action') }}</th>
      </tr>
    </tfoot>
</table>


@section('js')
<script> 
$(function() {
    var table = $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: '{{ route('products.index') }}',
          data: function (d) {
                d.sub_category_id = $('#sub_category_id').val();
                d.unit_id = $('#unit_id').val();
                d.search = $('input[type="search"]').val();
            }
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'title_en', name: 'title_en' },
            { data: 'title_ar', name: 'title_ar' },
            { data: 'amount', name: 'amount' },
            { data: 'real_price', name: 'real_price' },
            { data: 'sub_category_title_en', name: 'sub_category_title_en', orderable: false, searchable: false },
            { data: 'unit_title_en', name: 'unit_title_en', orderable: false, searchable: false },
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



    $('#sub_category_id').change(function() {
        $('#table').DataTable().ajax.reload(); // Access DataTable instance directly
    });
    $('#unit_id').change(function() {
        $('#table').DataTable().ajax.reload(); // Access DataTable instance directly
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

