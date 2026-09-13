@foreach ($tenders as $item)
    <div class="card mb-3">
        <div class="row g-0 align-items-center">
            <div class="col-md-2 text-center">
                <img src="{{asset('images/settings/' . getSettingValue('logo'))}}" width="80" class="img-fluid rounded-start" alt="User">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->title }}</h5>
                    <p class="card-text">
                        <strong>{{ trans('cruds.opening_date') }}:</strong> {{ $item->opening_date }} <br>
                        <strong>{{ trans('cruds.closing_date') }}:</strong> {{ $item->closing_date }} <br>
                        <small class="text-muted">{{ $item->publisher_name }}</small>
                    </p>
                </div>
            </div>
            <div class="col-md-2 text-center">
                @if(Auth::guard('client')->check())
                    <a class="btn btn-warning" href="{{ route('client.tender.show',$item->slug ?? $item->id) }}">{{ trans('cruds.more_info') }}</a>
                @else
                    <a class="btn btn-warning" href="{{ route('client.login') }}">{{ trans('cruds.more_info') }}</a>
                @endif
            </div>
        </div>
    </div>
@endforeach

