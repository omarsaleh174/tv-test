@extends('layouts.master')
@section('content')

{{-- <div class="page-header">
  <div class="row">
    
      <div class="col-sm-3">
          <a href="{{ route('tenders.create') }}" class="btn btn-primary mb-4 ">{{ trans('cruds.add') }} {{ trans("cruds.tenders") }}</a>
      </div>
      @include('includes.errors')

  </div>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans('cruds.home') }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ trans("cruds.tenders" ) }}</li>
  </ol>
</div> --}}
<br>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        @include('admin.tenders.table')

      </div>
    </div>
  </div>
</div>
@endsection
