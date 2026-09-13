@extends('layouts.master')
@section('content')
<div class="page-header">
  <div class="row">
      <div class="col-sm-3">
          <a href="{{ route('consultants.create') }}" class="btn btn-primary mb-4 ">{{ trans('cruds.add') }} {{ trans("cruds.consultants") }}</a>
      </div>
      @include('includes.errors')

  </div>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans('cruds.home') }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ trans("cruds.consultants" ) }}</li>
  </ol>
</div>

 
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        @include('admin.consultants.table')

      </div>
    </div>
  </div>
</div>
@include('admin.consultants.form')
@endsection
