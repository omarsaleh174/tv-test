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
          <label class="col-sm-12 col-form-label">{{ trans('cruds.city') }} <span class="text-red">*</span></label>
            <div class="col-sm-12">
                <select class="form-control form-select select2" id="city_id" name="city_id" data-bs-placeholder="Select">
                    <option value="" selected> {{ trans('cruds.city') }}</option>
                    @foreach(App\Entities\Admin\City::all() as $city)
                        <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>{{ $city->title }}</option>
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
            <th>{{trans('cruds.name')}}</th>
            <th>{{trans('cruds.email')}}</th>
            <th>{{trans('cruds.phone')}}</th>
            <th>{{trans('cruds.action') }}</th>
              </tr>
      </thead>
      <tbody>
       </tbody>
      <tfoot>
      <tr>
        <th>{{trans('cruds.id')}}</th>
        <th>{{trans('cruds.name')}}</th>
        <th>{{trans('cruds.email')}}</th>
        <th>{{trans('cruds.phone')}}</th>
        <th>{{trans('cruds.action') }}</th>
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
            url: '{{ route("clients.index") }}',
            data: function (d) {
                d.country_id  = $('#country_id').val();
                d.city_id = $('#city_id').val();
                d.search = $('input[type="search"]').val();
            }},
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'phone', name: 'phone' },
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
                      buttons: [
            ]

        }).buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');
        $('#country_id').change(function() {
            $('#table').DataTable().ajax.reload();
        });
        $('#city_id').change(function() {
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
  
