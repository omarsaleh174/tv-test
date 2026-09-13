@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="report-header text-center mb-4">
        <h1 class="display-4 text-primary">ØªÙ‚Ø§Ø±ÙŠØ± ÙˆØ¥Ø­ØµØ§Ø¦ÙŠØ§Øª Ø§Ù„Ù…Ù†Ø§Ù‚ØµØ§Øª</h1>
        <p class="lead text-muted">Ø¥Ø­ØµØ§Ø¦ÙŠØ§Øª Ø´Ø§Ù…Ù„Ø© Ø­ÙˆÙ„ Ø§Ù„Ù…Ù†Ø§Ù‚ØµØ§Øª Ø§Ù„Ù…Ø³Ø¬Ù„Ø© ÙÙŠ Ø§Ù„Ù†Ø¸Ø§Ù…</p>
    </div>

    <div class="row mb-4">
          @foreach (['totalTenders','admin_tender','client_tender','send_today_tender','send_tender','not_send_tender'] as $item)
        <div class="col-md-4 mb-3">
            <div class="card card-stats shadow-sm">
                <div class="card-body text-center">
                    <h4 class="card-title">{{ trans("cruds.$item") }}  </h4>
                    <p class="h5">{{ $$item }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="table-section mt-4 card shadow-sm p-4">
        <h3 class="text-center mb-4">Ø¹Ø¯Ø¯ Ø§Ù„Ù…Ù†Ø§Ù‚ØµØ§Øª Ø­Ø³Ø¨ Ø§Ù„Ø¨Ù„Ø¯ ÙˆØ§Ù„Ù‚Ø³Ù…</h3>
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Ø§Ù„Ù‚Ø³Ù…</th>
                    @foreach($countries as $country)
                        <th>{{ $country->title }}</th>
                    @endforeach
                    <th>Ø§Ù„Ø§Ø¬Ù…Ø§Ù„ÙŠ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->title }}</td>
                        @foreach($countries as $country)
                            <td>{{ $tendersByCountryCategory[$country->title][$category->title] ?? 0 }}</td>
                        @endforeach
                        <td>{{ $category->tenders_count }}</td>
                    </tr>
                @endforeach
                <tr class="font-weight-bold">
                    <th>Ø§Ù„Ø§Ø¬Ù…Ø§Ù„ÙŠ</th>
                    @foreach($countries as $country)
                        <th>{{ $country->tenders_count }}</th>
                    @endforeach
                    <th></th>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="filter-section mt-4 card">
        <div class="row">
          <div class="col-md-12 col-xl-3">
            <div class="form-group">
                    <label for="country_id" class="form-label">{{ trans('cruds.country') }} <span class="text-danger">*</span></label>
                    <select class="form-control select2" id="country_id" name="country_id" data-bs-placeholder="Select">
                        <option value="" selected>{{ trans('cruds.country') }}</option>
                        @foreach(App\Entities\Admin\Country::all() as $country)
                            <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>{{ $country->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

          

            <div class="col-md-12 col-xl-3">
              <div class="form-group">
                    <label for="category_id" class="form-label">{{ trans('cruds.category') }} <span class="text-danger">*</span></label>
                    <select class="form-control select2" id="category_id" name="category_id" data-bs-placeholder="Select">
                        <option value="" selected>{{ trans('cruds.category') }}</option>
                        @foreach(App\Entities\Admin\Category::all() as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-12 col-xl-3">
              <div class="form-group">
                <label class="col-sm-12 col-form-label">{{ trans('cruds.from') }} <span class="text-red">*</span></label>
                  <div class="col-sm-12">
                      <input type="date" name="from" id="from" class="form-control">
                  </div>
              </div>
          </div>

          <div class="col-md-12 col-xl-3">
            <div class="form-group">
              <label class="col-sm-12 col-form-label">{{ trans('cruds.to') }} <span class="text-red">*</span></label>
                <div class="col-sm-12">
                    <input type="date" name="to" id="to" class="form-control">
                </div>
            </div>
        </div>

        </div>
    </div>

    <div class="table-responsive mt-4 card">
        <table id="table" class="table table-bordered table-striped example1" width="100%">
            <thead class="thead-dark">
                <tr>
                    <th>{{ trans('cruds.id') }}</th>
                    <th>{{ trans('cruds.title') }}</th>
                    <th>{{ trans('cruds.tender_code') }}</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                    <th>{{ trans('cruds.id') }}</th>
                    <th>{{ trans('cruds.title') }}</th>
                    <th>{{ trans('cruds.tender_code') }}</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@section('js')
<script>
    $(function() {
        $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route("tenders.reports.show", 0) }}',
                data: function(d) {
                    d.country_id = $('#country_id').val();
                    d.from = $('#from').val();
                    d.to = $('#to').val();
                    d.category_id = $('#category_id').val();
                    d.search = $('input[type="search"]').val();
                }
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'title', name: 'title' },
                { data: 'tender_code', name: 'tender_code' },
            ],
            responsive: true,
            paging: false,
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
        $('#city_id').change(function() {
            $('#table').DataTable().ajax.reload();
        });
        $('#category_id').change(function() {
            $('#table').DataTable().ajax.reload();
        });
        $('#from').change(function() {
            $('#table').DataTable().ajax.reload();
        });
        $('#to').change(function() {
            $('#table').DataTable().ajax.reload();
        });
    });
</script>
<script src="{{ asset('build/assets/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('build/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('build/assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('build/assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('build/assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('build/assets/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ asset('build/assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('build/assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('build/assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('build/assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('build/assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('build/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('build/assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ asset('build/table-data.js') }}"></script>
@endsection
@endsection

