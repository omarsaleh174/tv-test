@extends('layouts.master')
@section('content')
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $data['new_orders'] ?? 0 }}</h3>
                            <p>{{ trans('cruds.new') }} {{ trans('cruds.orders') }}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('orders.index') }}" class="small-box-footer">{{ trans('cruds.more_info') }} <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $data['total_salary'] }} $</h3>
                            <p>{{ trans('cruds.total_income') }}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            {{-- {{ trans('cruds.more_info') }} --}}
                            <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $data['clients'] }} </h3>
                            <p>{{ trans('cruds.clients') }}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ route('clients.index') }}" class="small-box-footer">{{ trans('cruds.more_info') }} <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $data['products'] }} </h3>
                            <p>{{ trans('cruds.products') }}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{ route('products.index') }}" class="small-box-footer">{{ trans('cruds.more_info') }} <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>


            <div class="row">

                <section class="col-lg-6 connectedSortable">
                    <div class="card browsing-status">
                    <div class="card-header">
                        <p class="card-title">
                            <strong>Goal Completion</strong>
                        </p>
                    </div>
                    <br>
                    @php
                    $statuses = [
                        0 => 'canceled',
                        1 => 'placed',
                        2 => 'confirmed',
                        3 => 'shipped',
                        4 => 'out_of_delivery',
                        5 => 'delivered'
                    ];
                    $totalOrders = array_sum($orderCounts);
                @endphp
                
                @foreach($statuses as $key => $status)
                    @php
                        $count = $orderCounts[$key] ?? 0;
                        $percentage = $totalOrders ? ($count / $totalOrders) * 100 : 0;
                    @endphp
                    <div class="card-body">
                        {{ trans('cruds.' . $status) }}
                        <span class="float-right"><b>{{ $count }}</b>/{{ $totalOrders }}</span>
                        <div class="progress">
                            <div class="progress-bar bg-primary" style="width: {{ $percentage }}%"></div>
                        </div>
                    </div>
                @endforeach
                

                </div>
            </section>


                <section class="col-lg-6 connectedSortable">
                    <canvas id="myChart" width="500" height="400"></canvas> <!-- Fixed width -->
                    <script>
                        // Get products data from Laravel Blade
                        const products = @json($products);

                        // Canvas setup
                        const canvas = document.getElementById('myChart');
                        const ctx = canvas.getContext('2d');
                        const chartWidth = canvas.width;
                        const chartHeight = canvas.height;

                        // Chart settings
                        const padding = 50;
                        const numProducts = products.length;
                        const barWidth = numProducts > 0 ? (chartWidth - 2 * padding) / numProducts : 0;
                        const maxSales = numProducts > 0 ? Math.max(...products.map(p => parseInt(p.total_sales))) : 0;

                        // Function to draw bars
                        function drawBar(index, sales) {
                            const barHeight = maxSales > 0 ? (sales / maxSales) * (chartHeight - 2 * padding) : 0;
                            const x = padding + index * barWidth;
                            const y = chartHeight - padding - barHeight;

                            ctx.fillStyle = '#28a745'; // Bootstrap's info color
                            ctx.fillRect(x, y, barWidth - 10, barHeight);

                            // Draw text labels
                            ctx.save(); // Save current state
                            ctx.fillStyle = 'black';
                            ctx.textAlign = 'center';
                            ctx.font = '14px Arial';

                            // Rotate text for product names
                            ctx.translate(x + (barWidth - 10) / 2, chartHeight - padding + 20);
                            ctx.rotate(-Math.PI / 4); // Rotate by -45 degrees
                            ctx.fillText(products[index].title_en, 0, 0); // Centered text
                            ctx.restore(); // Restore to original state

                            // Draw sales numbers
                            ctx.textAlign = 'center';
                            ctx.font = '12px Arial';
                            ctx.fillText(products[index].total_sales, x + (barWidth - 10) / 2, y - 5);
                        }

                        // Draw chart
                        ctx.clearRect(0, 0, chartWidth, chartHeight);
                        products.forEach((product, index) => drawBar(index, parseInt(product.total_sales)));
                    </script>
                </section>

                <section class="col-lg-6 connectedSortable">
                    <br><br>
                    <div class="card bg-gradient-info">
                        <div class="card-header border-0">
                            <h3 class="card-title"> <i class="fas fa-th mr-1"></i> {{ trans('cruds.cities') }} </h3>
                            <div class="card-tools">
                                <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i></button>
                                <button type="button" class="btn bg-info btn-sm" data-card-widget="remove"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent">
                            <div class="row">
                                @php
                                    $totalClients = $data['clients'];
                                    $baseSize = 60;
                                @endphp

                                @foreach ($cities as $city)
                                    @php
                                        $percentage = $totalClients > 0 ? ($city->clients / $totalClients) * 100 : 0;
                                        $circleSize = $baseSize;
                                    @endphp
                                    <div class="col-4 text-center">
                                        <input type="text" class="knob" data-readonly="true"
                                            value="{{ $percentage }}" data-width="{{ $circleSize }}"
                                            data-height="{{ $circleSize }}" data-fgColor="#39CCCC"
                                            data-angleOffset="0" data-angleArc="360" data-thickness=".3">
                                        <div class="text-white">{{ $city->title_en }}</div>
                                    </div>
                                @endforeach
                                <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
                                <script src="https://cdn.jsdelivr.net/npm/jquery-knob@1.2.13/dist/jquery.knob.min.js"></script>
                                <script>
                                    $(function() {
                                        $(".knob").knob({
                                            // Ensure that the knob is properly configured
                                            readOnly: true,
                                            angleOffset: 0,
                                            angleArc: 360,
                                            thickness: 0.3
                                        });
                                    });
                                </script>


                            </div>
                        </div>
                    </div>


                    {{-- 
                    <div class="card bg-gradient-success">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                <i class="far fa-calendar-alt"></i>
                                Calendar
                            </h3>

                            <div class="card-tools">

                                <div class="btn-group">
                                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                                        <i class="fas fa-bars"></i>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a href="#" class="dropdown-item">Add new event</a>
                                        <a href="#" class="dropdown-item">Clear events</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">View calendar</a>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body pt-0">

                            <div id="calendar" style="width: 100%"></div>
                        </div>

                    </div> 
                --}}

                </section>

            </div>

        </div>
    </section>

@section('js')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/ammap.js"></script>
    <script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <script src="{{ asset('adminlte/plugins/chart.js/Chart.js') }}"></script>
    <script src="{{ asset('dashboard/js/pie-chart.js') }}"></script>
    <script src="{{ asset('dashboard/js/bar-chart.js') }}"></script> --}}
@endsection
@endsection
