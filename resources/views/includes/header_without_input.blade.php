<div class="page-header">
    <div class="row">
        <div class="col-sm-12">
            <h1>{{$item}}</h1>
        </div>
        @include('includes.errors')
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans('cruds.home') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ trans("cruds.$page" ) }}</li>
    </ol>
  </div>
