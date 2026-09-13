
<div class="col-3">
  <a href="{{ route('tenders.create') }}" class="btn btn-primary mb-4 ">{{ trans('cruds.add') }} {{ trans("cruds.tenders") }}</a>
</div>
  <div class="card-body">
    <div class="row">
        <div class="col-md-12 col-xl-3">
            <div class="form-group">
              <label class="col-sm-12 col-form-label">{{ trans('cruds.country') }} <span class="text-red">*</span></label>
                <div class="col-sm-12">
                    <select class="form-control form-select select2" id="country_id" name="country_id" data-bs-placeholder="Select">
                        <option value="" selected> {{ trans('cruds.country') }}</option>
                        @foreach(App\Entities\Admin\Country::all() as $country)
                            <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>{{ $country->title }}</option>
                        @endforeach
                  </select>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-3">
            <div class="form-group">
              <label class="col-sm-12 col-form-label">{{ trans('cruds.status') }} <span class="text-red">*</span></label>
                <div class="col-sm-12">
                    <select class="form-control form-select select2" id="status" name="status" data-bs-placeholder="Select">
                            <option value="0"> Ø§Ù„ÙƒÙ„<option>
                              <option value="1"> Ù„Ù… ØªØ±Ø³Ù„ Ø¨Ø¹Ø¯<option>
                            <option value="2"> ØªÙ… Ø§Ø±Ø³Ø§Ù„Ù‡Ø§<option>
                  </select>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-12 col-xl-3">
            <div class="form-group">
              <label class="col-sm-12 col-form-label">{{ trans('cruds.category') }} <span class="text-red">*</span></label>
                <div class="col-sm-12">
                    <select class="form-control form-select select2" id="category_id" name="category_id" data-bs-placeholder="Select">
                        <option value="" selected> {{ trans('cruds.category') }}</option>
                        @foreach(App\Entities\Admin\Category::all() as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div> --}}
        <div class="col-md-12 col-xl-3">
            <div class="form-group">
              <label class="col-sm-12 col-form-label">{{ trans('cruds.type') }} <span class="text-red">*</span></label>
                <div class="col-sm-12">
                    <select class="form-control form-select select2" id="type" name="type" data-bs-placeholder="Select">
                        <option value="" selected> {{ trans('cruds.type') }}</option>
                        @foreach(App\Entities\Admin\Type::all() as $type)
                            <option value="{{ $type->id }}" {{ old('type') == $type->id ? 'selected' : '' }}>{{ $type->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-3">
            <div class="form-group">
              <label class="col-sm-12 col-form-label">{{ trans('cruds.date') }} <span class="text-red">*</span></label>
                <div class="col-sm-12">
                    <input type="date" name="created_at" id="created_at" class="form-control">
                </div>
            </div>
        </div>
    </div>
  </div>
<table id="table" class="table table-bordered table-striped example1" width="100%">
  <thead>
      <tr>
          <th>{{trans('cruds.id')}}</th>
          <th>{{trans('cruds.tender_code')}}</th>
          <th>{{trans('cruds.title')}}</th>
          <th>{{ trans('cruds.action') }}</th>
      </tr>
    </thead>
    <tbody>
     </tbody>
    <tfoot>
      <tr>
          <th>{{trans('cruds.id')}}</th>
          <th>{{trans('cruds.tender_code')}}</th>
          <th>{{trans('cruds.title')}}</th>
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
            url: '{{ route("tenders.index") }}',
            data: function (d) {
                d.country_id  = $('#country_id').val();
                d.status  = $('#status').val();
                d.created_at  = $('#created_at').val();
                d.category_id = $('#category_id').val();
                d.type = $('#type').val();
                d.search = $('input[type="search"]').val();
            }},
            columns: [
              { data: 'id', name: 'id' },
              { data: 'tender_code', name: 'tender_code' },
              { data: 'title', name: 'title' },
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

      $('#country_id').change(function() {
            $('#table').DataTable().ajax.reload();
        });
      $('#status').change(function() {
            $('#table').DataTable().ajax.reload();
        });
      $('#category_id').change(function() {
            $('#table').DataTable().ajax.reload();
        });
        $('#type').change(function() {
            $('#table').DataTable().ajax.reload();
        });
        $('#created_at').change(function() {
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

