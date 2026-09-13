@extends('layouts.master')
@section('styles')
@endsection
@section('content')
@canany('admin', 'view dashboard')
    
<div class="page-header">
    <h1 class="page-title">{{ getSettingValue('name') }}</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">{{ trans('cruds.home') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ getSettingValue('name') }}</li>
    </ol>
</div>

<div class="row">
    <!-- Ø¹Ø¯Ø¯ Ø§Ù„Ø¹Ù…Ù„Ø§Ø¡ -->
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card bg-primary img-card box-primary-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        <h2 class="mb-0 number-font">{{ $data['clients_count'] }}</h2>
                        <p class="text-white mb-0">{{ trans('cruds.clients') }}</p>
                    </div>
                    <div class="ms-auto"><i class="fa fa-users text-white fs-30 me-2 mt-2"></i></div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Ø¹Ø¯Ø¯ Ø§Ù„Ù…Ø³ØªØ´Ø§Ø±ÙŠÙ† -->
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card bg-secondary img-card box-secondary-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        <h2 class="mb-0 number-font">{{ $data['advisors_count'] }}</h2>
                        <p class="text-white mb-0">{{ trans('cruds.consultants') }}</p>
                    </div>
                    <div class="ms-auto"><i class="fa fa-users-cog text-white fs-30 me-2 mt-2"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ø¹Ø¯Ø¯ Ø§Ù„Ø£Ù‚Ø³Ø§Ù… -->
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card bg-success img-card box-success-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        <h2 class="mb-0 number-font">{{ $data['departments_count'] }}</h2>
                        <p class="text-white mb-0">{{ trans('cruds.departments') }}</p>
                    </div>
                    <div class="ms-auto"><i class="fa fa-sitemap text-white fs-30 me-2 mt-2"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ø¹Ø¯Ø¯ Ø§Ù„Ù…Ù†Ø§Ù‚ØµØ§Øª -->
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card bg-info img-card box-info-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        <h2 class="mb-0 number-font">{{ $data['tenders_count'] }}</h2>
                        <p class="text-white mb-0">{{ trans('cruds.tenders') }}</p>
                    </div>
                    <div class="ms-auto"><i class="fa fa-gavel text-white fs-30 me-2 mt-2"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ø¥Ø­ØµØ§Ø¦ÙŠØ§Øª Ø¥Ø¶Ø§ÙÙŠØ© -->
<div class="row">
    <!-- Ø¢Ø®Ø± 6 Ø¹Ù…Ù„Ø§Ø¡ -->
    <div class="col-md-12 col-lg-12 col-xl-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ trans('cruds.latest_clients') }}</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>{{ trans('cruds.name') }}</th>
                                <th>{{ trans('cruds.email') }}</th>
                                <th>{{ trans('cruds.phone') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latestClients as $client)
                                <tr>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->phone }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Ø¢Ø®Ø± 6 Ù…Ø³ØªØ´Ø§Ø±ÙŠÙ† -->
    <div class="col-md-12 col-lg-12 col-xl-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ trans('cruds.latest_advisors') }}</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>{{ trans('cruds.name') }}</th>
                                <th>{{ trans('cruds.email') }}</th>
                                <th>{{ trans('cruds.phone') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latestAdvisors as $advisor)
                                <tr>
                                    <td>{{ $advisor->name }}</td>
                                    <td>{{ $advisor->email }}</td>
                                    <td>{{ $advisor->phone}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ø¢Ø®Ø± 6 Ù…Ù†Ø§Ù‚ØµØ§Øª -->
<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ trans('cruds.latest_tenders') }}</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>{{ trans('cruds.title') }}</th>
                                <th>{{ trans('cruds.closing_date') }}</th>
                                <th>{{ trans('cruds.publisher_name') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latestTenders as $tender)
                                <tr>
                                    <td>{{ $tender->title }}</td>
                                    <td>{{ $tender->closing_date }}</td>
                                    <td>{{ $tender->publisher_name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ trans('cruds.latest_tenders') }}</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>{{ trans('cruds.title') }}</th>
                                <th>{{ trans('cruds.closing_date') }}</th>
                                <th>{{ trans('cruds.publisher_name') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latestTenders as $tender)
                                <tr>
                                    <td>{{ $tender->title }}</td>
                                    <td>{{ $tender->closing_date }}</td>
                                    <td>{{ $tender->publisher_name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endcanany

@endsection

@section('scripts')
<script src="{{asset('build/assets/plugins/chart/Chart.bundle.js')}}"></script>
<script src="{{asset('build/assets/plugins/charts-c3/d3.v5.min.js')}}"></script>
<script src="{{asset('build/assets/plugins/charts-c3/c3-chart.js')}}"></script>
<script src="{{asset('build/assets/plugins/chart/utils.js')}}"></script>
<script src="{{ asset('build/index3.js') }}"></script>
<script src="{{ asset('build/apexcharts.js') }}"></script>
<script src="{{ asset('build/assets/plugins/echarts/echarts.js') }}"></script>
<link rel="modulepreload" href="{{ asset('build/assets/apexcharts.common-0f50d334.js') }}" />
<script type="module" src="{{ asset('build/assets/apexcharts-36cd331b.js')}}"></script> 
<link rel="modulepreload" href="{{ asset('build/assets/apexcharts-36cd331b.js') }}" />
@endsection

