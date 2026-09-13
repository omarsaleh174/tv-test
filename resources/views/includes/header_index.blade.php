<div class="page-header">
    <div class="row">
        <div class="col-sm-3">
            <button type="button" class="btn btn-primary mb-4 " data-bs-toggle="modal"data-bs-target="#modal-lg">{{ trans('cruds.add') }} {{ trans("cruds.$item") }}</button>
        </div>
        @include('includes.errors')
  
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans('cruds.home') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ trans("cruds.$item" ) }}</li>
    </ol>
  </div>
