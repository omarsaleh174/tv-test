@extends('layouts.master')

@section('content')

<div class="container mt-5">

    <div class="report-header text-center mb-4">
        <h1 class="display-4 text-primary">تقارير وإحصائيات العملاء</h1>
        <p class="lead text-muted">
            إحصائيات شاملة حول العملاء المسجلين في النظام
        </p>
    </div>

    <div class="row mb-4">

        <div class="col-md-4 mb-3">
            <div class="card card-stats shadow-sm">
                <div class="card-body text-center">
                    <h4 class="card-title">إجمالي عدد العملاء</h4>
                    <p class="h5">{{ $totalClients }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card card-stats shadow-sm">
                <div class="card-body text-center">
                    <h4 class="card-title">عدد العملاء النشطين</h4>
                    <p class="h5">{{ $activeClients }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card card-stats shadow-sm">
                <div class="card-body text-center">
                    <h4 class="card-title">عدد العملاء غير النشطين</h4>
                    <p class="h5">{{ $inactiveClients }}</p>
                </div>
            </div>
        </div>

    </div>


    <div class="table-section mt-4 card shadow-sm p-4">

        <h3 class="text-center mb-4">
            عدد العملاء حسب البلد والقسم
        </h3>

        <table class="table table-bordered table-striped table-hover">

            <thead class="thead-dark">
                <tr>
                    <th>القسم</th>

                    @foreach($countries as $country)
                        <th>{{ $country->title }}</th>
                    @endforeach

                    <th>الإجمالي</th>
                </tr>
            </thead>

            <tbody>

                @foreach($categories as $category)
                    <tr>

                        <td>{{ $category->title }}</td>

                        @foreach($countries as $country)
                            <td>
                                {{ $clientsByCountryCategory[$country->title][$category->title] ?? 0 }}
                            </td>
                        @endforeach

                        <td>{{ $category->clients_count }}</td>

                    </tr>
                @endforeach


                <tr class="font-weight-bold">

                    <th>الإجمالي</th>

                    @foreach($countries as $country)
                        <th>{{ $country->clients_count }}</th>
                    @endforeach

                    <th></th>

                </tr>

            </tbody>

        </table>

    </div>


    <div class="filter-section mt-4 card">

        <div class="row">

            <div class="col-md-3 mb-3">

                <div class="form-group">

                    <label for="country_id" class="form-label">
                        {{ trans('cruds.country') }}
                        <span class="text-danger">*</span>
                    </label>

                    <select
                        class="form-control select2"
                        id="country_id"
                        name="country_id"
                        data-bs-placeholder="Select"
                    >

                        <option value="" selected>
                            {{ trans('cruds.country') }}
                        </option>

                        @foreach(App\Entities\Admin\Country::all() as $country)

                            <option
                                value="{{ $country->id }}"
                                {{ old('country_id') == $country->id ? 'selected' : '' }}
                            >
                                {{ $country->title }}
                            </option>

                        @endforeach

                    </select>

                </div>

            </div>


            <div class="col-md-3 mb-3">

                <div class="form-group">

                    <label for="city_id" class="form-label">
                        {{ trans('cruds.city') }}
                        <span class="text-danger">*</span>
                    </label>

                    <select
                        class="form-control select2"
                        id="city_id"
                        name="city_id"
                        data-bs-placeholder="Select"
                    >

                        <option value="" selected>
                            {{ trans('cruds.city') }}
                        </option>

                        @foreach(App\Entities\Admin\City::all() as $city)

                            <option
                                value="{{ $city->id }}"
                                {{ old('city_id') == $city->id ? 'selected' : '' }}
                            >
                                {{ $city->title }}
                            </option>

                        @endforeach

                    </select>

                </div>

            </div>


            <div class="col-md-3 mb-3">

                <div class="form-group">

                    <label for="category_id" class="form-label">
                        {{ trans('cruds.category') }}
                        <span class="text-danger">*</span>
                    </label>

                    <select
                        class="form-control select2"
                        id="category_id"
                        name="category_id"
                        data-bs-placeholder="Select"
                    >

                        <option value="" selected>
                            {{ trans('cruds.category') }}
                        </option>

                        @foreach(App\Entities\Admin\Category::all() as $category)

                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}
                            >
                                {{ $category->title }}
                            </option>

                        @endforeach

                    </select>

                </div>

            </div>


            <div class="col-md-3 col-xl-3">

                <div class="form-group">

                    <label class="col-sm-12 col-form-label">
                        {{ trans('cruds.from') }}
                        <span class="text-red">*</span>
                    </label>

                    <div class="col-sm-12">
                        <input
                            type="date"
                            name="from"
                            id="from"
                            class="form-control"
                        >
                    </div>

                </div>


                <div class="form-group">

                    <label class="col-sm-12 col-form-label">
                        {{ trans('cruds.to') }}
                        <span class="text-red">*</span>
                    </label>

                    <div class="col-sm-12">
                        <input
                            type="date"
                            name="to"
                            id="to"
                            class="form-control"
                        >
                    </div>

                </div>

            </div>

        </div>

    </div>


    <div class="table-responsive mt-4 card">

        <table
            id="table"
            class="table table-bordered table-striped example1"
            width="100%"
        >

            <thead class="thead-dark">
                <tr>
                    <th>{{ trans('cruds.id') }}</th>
                    <th>{{ trans('cruds.name') }}</th>
                    <th>{{ trans('cruds.email') }}</th>
                    <th>{{ trans('cruds.phone') }}</th>
                </tr>
            </thead>

            <tbody>
            </tbody>

            <tfoot>
                <tr>
                    <th>{{ trans('cruds.id') }}</th>
                    <th>{{ trans('cruds.name') }}</th>
                    <th>{{ trans('cruds.email') }}</th>
                    <th>{{ trans('cruds.phone') }}</th>
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

                url: '{{ route("reports.show", 0) }}',

                data: function(d) {

                    d.country_id = $('#country_id').val();
                    d.city_id = $('#city_id').val();
                    d.category_id = $('#category_id').val();
                    d.from = $('#from').val();
                    d.to = $('#to').val();

                    d.search = $('input[type="search"]').val();

                }

            },

            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'phone', name: 'phone' },
            ],

            responsive: true,
            paging: false,
            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: true,

            dom: '<"top"lfB>rt<"bottom"ip><"clear">',

            buttons: [
                {
                    extend: 'excelHtml5',
                    text: 'Export to Excel',
                    title: 'Report Data',
                },
            ]

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